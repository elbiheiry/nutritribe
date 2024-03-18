<?php

namespace App\Http\Requests\Admin;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class AboutRequest extends FormRequest
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
            'image' => 'max:2048',
            'description1' => 'required',
            'description2' => 'required',
            'promise' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Maximum size allowed for image is 2MB',
            'description1.required' => 'Please enter the first description',
            'description2.required' => 'Please enter the second description',
            'promise.required' => 'Please enter some data in our promise'
        ];
    }

    public function edit()
    {
        $about = About::first();

        $about->description1 = $this->description1;
        $about->description2 = $this->description2;
        $about->promise = $this->promise;

        if ($this->image){
            @unlink(storage_path('app/about/'.$about->image));
            $this->image->store('about');
            $about->image = $this->image->hashName();
            Image::make(storage_path('app/about/'.$this->image->hashName()))
                ->resize(475 , 545)
                ->save(storage_path('app/about/'.$this->image->hashName()));
        }

        $about->save();
    }
}
