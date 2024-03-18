<?php

namespace App\Http\Requests\Admin;

use App\Gallery;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Intervention\Image\Facades\Image;

class GalleryRequest extends FormRequest
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
            'image' => $this->routeIs('admin.gallery') ? 'required|max:2048' : 'max:2048'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->routeIs('admin.gallery') ? 'Please upload your image' : '',
            'image.max' => 'Maximum size allowed for image is 2MB'
        ];
    }

    public function store()
    {
        $image = new Gallery();

        $this->image->store('gallery');
        $image->image = $this->image->hashName();
        Image::make(storage_path('app/gallery/'.$this->image->hashName()))
            ->resize(800 , 530)
            ->save(storage_path('app/gallery/'.$this->image->hashName()));

        $image->save();
    }

    public function edit($id)
    {
        $image = Gallery::find($id);

        @unlink(storage_path('app/gallery/'.$image->image));
        $this->image->store('gallery');
        $image->image = $this->image->hashName();
        Image::make(storage_path('app/gallery/'.$this->image->hashName()))
            ->resize(800 , 530)
            ->save(storage_path('app/gallery/'.$this->image->hashName()));

        $image->save();
    }
}
