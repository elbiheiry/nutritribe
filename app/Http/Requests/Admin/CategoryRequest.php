<?php

namespace App\Http\Requests\Admin;

use App\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter category name'
        ];
    }

    public function store()
    {
        $category = new Category();

        $category->name = $this->name;
        $category->slug = Category::whereSlug(Str::slug($this->name))->exists() ? Str::slug($this->name).'-1' : Str::slug($this->name);

        $category->save();
    }

    public function edit($id)
    {
        $category = Category::find($id);

        $category->name = $this->name;
        $category->slug = Category::whereSlug(Str::slug($this->name))->where('id' , '!=',$id)->exists() ? Str::slug($this->name).'-1' : Str::slug($this->name);

        $category->save();
    }
}
