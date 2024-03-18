<?php

namespace App\Http\Requests\Site;

use App\Mail\SubscribtionEMail;
use App\Subscriber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Mail;
use Newsletter;

class SubscribeRequest extends FormRequest
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
        throw new HttpResponseException(response()->json($validator->errors()->first() , 500));
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
            'email' => 'required|email|unique:subscribers,email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.email' => 'This email isn\'t valid ',
            'email.unique' => 'This email is already added to the list of subscribers'
        ];
    }

    public function store()
    {
        $subscriber = new Subscriber();

        $subscriber->email = $this->email;
        $subscriber->name = $this->name;

        if ($subscriber->save()){
            if ( ! Newsletter::isSubscribed($subscriber->email) ) {
                Newsletter::subscribe($subscriber->email,['FNAME'=>$subscriber->name]);
            }
            Mail::to($subscriber->email)->send(new SubscribtionEMail($subscriber->name ,$subscriber->email));
        }
    }
}
