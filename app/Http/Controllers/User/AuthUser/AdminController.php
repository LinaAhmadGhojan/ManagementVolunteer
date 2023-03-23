<?php

namespace App\Http\Controllers\User\AuthUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use  App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{



    public function AdminLogin(RequestLogin $request)
    {


        if (\Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember')))
        {
            return response()->json(
                [
                  'code'=>200,
                  'message'=>  "تم تسجيل مدير المنظومة بنجاح",
                  'token'=>Auth::guard('admin')->user()->createToken("token superadmin")->plainTextToken
                ], 200);

        }

        return response()->json(
            [
              'code'=>401,
              'message'=>  "يوجد خطأ في كلمة السر أو الإيميل ",
            ], 401);

    }


    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.form'));
    }
}
