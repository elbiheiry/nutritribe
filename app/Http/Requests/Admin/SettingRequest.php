<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'off_days' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter your company email',
            'phone.required' => 'Please enter your phone number for contact',
            'description.required' => 'Please enter some words about your company',
            'facebook.required' => 'Please enter your facebook page link',
            'instagram.required' => 'Please enter your instagram account link',
            'start_time.required' => 'Please choose your working start time',
            'end_time.required' => 'Please choose your working end time',
            'off_days.required' => 'Please choose your vacation days'
        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->email = $this->email;
        $settings->phone = $this->phone;
        $settings->description = $this->description;
        $settings->facebook = $this->facebook;
        $settings->instagram = $this->instagram;
        $settings->off_days = $this->off_days;
        $settings->start_time = $this->start_time;
        $settings->end_time = $this->end_time;

        $settings->save();
    }
}
