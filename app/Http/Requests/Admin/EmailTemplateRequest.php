<?php

namespace App\Http\Requests\Admin;

use App\EmailTemplate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmailTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * define the error of the rules
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['data' => $validator->errors()->first()], 500));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'description4' => 'required',
            'description5' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'description1.required' => 'Please enter the booking email first part',
            'description2.required' => 'Please enter the booking email second part',
            'description3.required' => 'Please enter the order email first part',
            'description4.required' => 'Please enter the order email second part',
            'description5.required' => 'Please enter the order email third part',
        ];
    }

    public function edit()
    {
        $email = EmailTemplate::first();

        $email->description1 = $this->description1;
        $email->description2 = $this->description2;
        $email->description3 = $this->description3;
        $email->description4 = $this->description4;
        $email->description5 = $this->description5;
        
        $email->save();
    }
}
