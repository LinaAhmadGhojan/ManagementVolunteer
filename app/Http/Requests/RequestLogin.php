<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class RequestLogin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    
    public function messages()
      {
        return [
        'email.required' => 'يحب إدخال الإيميل ',
        'password.required' => 'يحب إدخال كلمة السر ',
        'email.email' => ' @ يحب إدخال الإيميل يحوي إشارة ',
        'password.min' => 'يحب إدخال كلمة السر على الأقل ستة أحرف',
        ];
     }


     public function failedValidation(Validator $validator)

     {
 
         throw new HttpResponseException(response()->json([
 
             'code'=>401,
             'success'=> false,
             'message'=> $validator->errors()
 
         ]));
 
     }
 
}
