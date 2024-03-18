<?php

namespace App\Http\Requests\Admin;

use App\Slider;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class SliderRequest extends FormRequest
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
            'description' => 'required',
            'image' => $this->routeIs('admin.slider') ? 'required|max:2024' : 'max:2024'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter slide name',
            'description' => 'Please enter slide description',
            'image.required' => $this->routeIs('admin.slider') ? 'Please enter slide image' : '',
            'image.max' => 'Maximum size allowed for image is 2MB'
        ];
    }

    public function store()
    {
        $slide = new Slider();

        $slide->name = $this->name;
        $slide->description = $this->description;

        $this->image->store('slide');
        $slide->image = $this->image->hashName();
        Image::make(storage_path('app/slide/'.$this->image->hashName()))
            ->resize(495 , 400)
            ->save(storage_path('app/slide/'.$this->image->hashName()));

        $slide->save();
    }

    public function edit($id)
    {
        $slide = Slider::find($id);

        $slide->name = $this->name;
        $slide->description = $this->description;

        if ($this->image){
            @unlink(storage_path('app/slide/'.$slide->image));
            $this->image->store('slide');
            $slide->image = $this->image->hashName();
            Image::make(storage_path('app/slide/'.$this->image->hashName()))
                ->resize(495 , 400)
                ->save(storage_path('app/slide/'.$this->image->hashName()));
        }

        $slide->save();
    }
}
