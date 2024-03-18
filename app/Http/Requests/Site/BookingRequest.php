<?php

namespace App\Http\Requests\Site;

use App\Appointment;
use App\Mail\BookAppointmentEmail;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Mail;

class BookingRequest extends FormRequest
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
            'date_time_picker' => 'required',
            'start' => 'required',
            'one_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date_time_picker.required' => 'Please tell us when you want to book your appointment',
            'start.required' => 'Please tell us the start time',
            'one_time.required' => 'Please choose if one time session or not ?'
        ];
    }

    public function store()
    {

        $appointment = new Appointment();

        $appointment->category_id = $this->category_id;
        $appointment->product_id = $this->product_id;
        $appointment->employee = $this->employee;
        $appointment->one_time = $this->one_time;
        $appointment->available_date = $this->date_time_picker;
        $appointment->start = Carbon::parse($this->start)->format('H:i');
        $appointment->end = Carbon::parse($this->start)->addHour()->format('H:i');
        $appointment->user_id = auth()->id();

        if ($appointment->save()){
            $data = [
                'category_id' => $appointment->category_id,
                'product' => $appointment->product['name'],
                'employee' => $appointment->employee,
                'available_date' => $appointment->available_date,
                'start' => $appointment->start,
                'one_time' => $appointment->one_time,
                'end' => $appointment->end,
                'name' => auth()->user()->name
            ];

            Mail::to(auth()->user()->email)->send(new BookAppointmentEmail($data));
        }
    }
}
