<?php

namespace App\Http\Controllers\User\AuthUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use  App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
 
    public function volunteerLogin(RequestLogin $request)
    {
        
        if (\Auth::attempt($request->only(['email','password']), $request->get('remember')))
        {

            return response()->json(
                [
                  'code'=>200,
                  'message'=>  "تم تسجيل المتطوع  بنجاح",
                  'token'=>Auth::user()->createToken("token volunteer")->plainTextToken
                ], 200); 
            
        }

        return response()->json(
            [
              'code'=>401,
              'message'=>  "يوجد خطأ في كلمة السر أو الإيميل ",
            ], 401); 
           
    }
}
