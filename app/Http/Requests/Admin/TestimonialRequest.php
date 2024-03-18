<?php

namespace App\Http\Requests\Admin;

use App\Testimonial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonialRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the name',
            'description.required' => 'Please enter the description'
        ];
    }

    public function store()
    {
        $testimonial = new Testimonial();

        $testimonial->name = $this->name;
        $testimonial->description = $this->description;

        $testimonial->save();
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        $testimonial->name = $this->name;
        $testimonial->description = $this->description;

        $testimonial->save();
    }
}
