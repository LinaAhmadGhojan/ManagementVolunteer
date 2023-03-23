<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RequestActivity extends FormRequest
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
            'date'   => 'required|date',
            'time'   => 'required',
            'place'   => 'required',
            'start_register'   => 'required|date',
            'end_register'   => 'required|date|after_or_equal:start_register',
            'number_volunteer'   => 'required',
            'id_admin'   => 'required',
            'id_initiative' => 'required'
        ];
    }


    public function messages()
      {
        return [
            'date.required' => ' يحب إدخال هذا الحقل  ',
            'date.date' => ' يحب إدخال تاريخ الفعالية',
            'time.required' => ' يحب إدخال هذا الحقل  ',
            'place.required' => ' يحب إدخال المكان ',
            'start_register.required' => 'يحب إدخال هذا الحقل ',
            'start_register.date' => ' يحب إدخال تاريخ ',
            'end_register.required' => ' يحب إدخال هذا الحقل ',
            'end_register.date' => ' يحب إدخال تاريخ ',
            'end_register.after_or_equal' => ' يحب إدخال تاريخ النهاية أكبر من تاريخ البدأ',
            'number_volunteer.required' => ' يحب إدخال رقم المتطوعين ',
            'id_admin.required' => ' يحب إختيار مشرف الفعالية ',
            'id_initiative.required' => ' يحب إختيار المبادرة ',



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
