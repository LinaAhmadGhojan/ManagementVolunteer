<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class RequestProject extends FormRequest
{
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
            'name'   => 'required',
            'image'   => 'required',
            'description' => 'required'
        ];
    }


    public function messages()
      {
        return [
        'name.required' => 'يحب إدخال الاسم ',
        'image.required' => 'يحب إدخال الصورة ',
       // 'image.mimes' => 'jpg أو png يحب إدخال لاحقة الصورة ',
        'description.required' => 'يحب إدخال وصف المشروع  ',

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
