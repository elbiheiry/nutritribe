<?php

namespace App\Http\Requests\Site;

use App\OrderDetail;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Order;

class OrderDetailRequest extends FormRequest
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
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'postal' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'notes' => 'required',
            'waist' => 'required',
            'body' => 'required',
            'reason' => 'required',
            'history' => 'required',
            'medications' => 'required',
            'vitamins' => 'required',
            'exercise' => 'required',
            'home' => 'required',
            'enjoy' => 'required',
            'surgeries' => 'required',
            'allergies' => 'required',
            'intention' => 'required',
            'diary' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'city.required' => 'Please tell us what is your city name',
            'address.required' => 'Please tell us your address',
            'phone.required' => 'Please tell us your phone number',
            'postal.required' => 'Please tell us your postal code',
            'age.required' => 'Please tell us your age',
            'weight.required' => 'how much is your weight',
            'height.required' => 'What is your height',
            'notes.required' => 'Tell us if there is any notes please',
            'waist.required' => 'Please tell us your Waist circumference',
            'body.required' => 'Please tell us your Body composition',
            'reason.required' => 'Please tell us your Reason for seeking Nutritional Therapy',
            'history.required' => 'Please tell us your History of eating disorders',
            'medications.required' => 'Please list below all of your current medications',
            'vitamins.required' => 'Please list all the vitamins and supplements you are currently using',
            'exercise.required' => 'Do you exercise?',
            'home.required.' => 'Do you usually mostly eat at home (cooked meals) or do you eat out?',
            'enjoy.required' => 'Do you enjoy cooking and following new recipes?',
            'surgeries.required' => 'Any recent surgeries in the past three months',
            'allergies.required' => 'If you have any food allergies, please specify What is your ideal weight?',
            'intention.required' => 'Please share your personal Intention for this program',
            'diary.required' => 'Write in details your food diary for the past three days'
        ];
    }

    public function store($id)
    {
        
        $original = Order::find($id);
        
        $original->city = $this->city;
        $original->address = $this->address;
        $original->phone = $this->phone;
        $original->postal = $this->postal;
        
        $original->save();
        
        $order = new OrderDetail();
        
        $order->order_id = $id;
        $order->why = $this->why;
        $order->kind_of_exercise = $this->kind_of_exercise;
        $order->age = $this->age;
        $order->weight = $this->weight;
        $order->height = $this->height;
        $order->notes = $this->notes;
        $order->waist = $this->waist;
        $order->body = $this->body;
        $order->reason = $this->reason;
        $order->history = $this->history;
        $order->medications = $this->medications;
        $order->vitamins = $this->vitamins;
        $order->exercise = $this->exercise;
        $order->home = $this->home;
        $order->enjoy = $this->enjoy;
        $order->surgeries = $this->surgeries;
        $order->allergies = $this->allergies;
        $order->intention = $this->intention;
        $order->diary = $this->diary;

        $order->save();
    }
}
