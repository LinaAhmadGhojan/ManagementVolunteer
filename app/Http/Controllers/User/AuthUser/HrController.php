<?php

namespace App\Http\Controllers\User\AuthUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use  App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Validator;

class HrController extends Controller
{

  

    public function HrLogin(RequestLogin $request)
    {
        
        if (\Auth::guard('hr')->attempt($request->only(['email','password']), $request->get('remember')))
        {
            return response()->json(
                [
                  'code'=>200,
                  'message'=>  "تم تسجيل موظف الموارد البشرية بنجاح",
                  'token'=>Auth::guard('hr')->user()->createToken("token hr")->plainTextToken
                ], 200); 
            
        }

        return response()->json(
            [
              'code'=>401,
              'message'=>  "يوجد خطأ في كلمة السر أو الإيميل ",
            ], 401); 
           
    }


    
}
