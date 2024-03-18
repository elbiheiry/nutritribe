<?php

namespace App\Http\Requests\Admin;

use App\Faq;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FaqRequest extends FormRequest
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
            'question' => 'required',
            'answer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'Please enter the question',
            'answer.required' => 'Please enter the answer'
        ];
    }

    public function store()
    {
        $faq = new Faq();

        $faq->question = $this->question;
        $faq->answer = $this->answer;

        $faq->save();
    }

    public function edit($id)
    {
        $faq = Faq::find($id);

        $faq->question = $this->question;
        $faq->answer = $this->answer;

        $faq->save();
    }
}
