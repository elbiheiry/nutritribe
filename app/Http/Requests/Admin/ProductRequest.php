<?php

namespace App\Http\Requests\Admin;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductRequest extends FormRequest
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
            'image' => $this->routeIs('admin.products') ? 'required|max:2048' : 'max:2048',
            'name' => 'required',
            'egp_price' => 'required|numeric',
            'usd_price' => 'required|numeric',
            'eur_price' => 'required|numeric',
            'uae_price' => 'required|numeric',
            'description' => 'required',
            'features' => 'required',
            'benefits' => 'required',
            'duration' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->routeIs('admin.products') ? 'Please upload package image' : '',
            'image.max' => 'Package image should be less than 2MB',
            'name.required' => 'Please enter package name',
            'egp_price.required' => 'Please enter the price of the package in egyptian pound',
            'egp_price.numeric' => 'Price should be numeric',
            'usd_price.required' => 'Please enter the price of the package in dollar',
            'usd_price.numeric' => 'Price should be numeric',
            'eur_price.required' => 'Please enter the price of the package in euro',
            'eur_price.numeric' => 'Price should be numeric',
            'uae_price.required' => 'Please enter the price of the package in dirham',
            'uae_price.numeric' => 'Price should be numeric',
            'description.required' => 'Please enter package description',
            'features.required' => 'Please enter package features',
            'benefits.required' => 'Please enter package benefits',
            'duration.required' => 'Please enter package duration'
        ];
    }

    public function store($id)
    {
        $product = new Product();

        $product->category_id = $id;
        $product->name = $this->name;
        $product->egp_price = $this->egp_price;
        $product->usd_price = $this->usd_price;
        $product->eur_price = $this->eur_price;
        $product->uae_price = $this->uae_price;
        $product->description = $this->description;
        $product->features = $this->features;
        $product->benefits = $this->benefits;
        $product->requirements = $this->requirements;
        $product->duration = $this->duration;
        $product->slug = Product::whereSlug(Str::slug($this->name))->exists() ? Str::slug($this->name).'-1' : Str::slug($this->name);

        $this->image->store('products');
        $product->image = $this->image->hashName();

        Image::make(storage_path('app/products/'.$product->image))
            ->resize(270 , 180)
            ->save(storage_path('app/products/'.$product->image));

        $product->save();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $product->name = $this->name;
        $product->egp_price = $this->egp_price;
        $product->usd_price = $this->usd_price;
        $product->eur_price = $this->eur_price;
        $product->uae_price = $this->uae_price;
        $product->description = $this->description;
        $product->features = $this->features;
        $product->benefits = $this->benefits;
        $product->requirements = $this->requirements;
        $product->duration = $this->duration;
        $product->slug = Product::whereSlug(Str::slug($this->name))->where('id' , '!=',$id)->exists() ? Str::slug($this->name).'-1' : Str::slug($this->name);

        if ($this->image) {
            @unlink(storage_path('app/products/'.$product->image));
            $this->image->store('products');
            $product->image = $this->image->hashName();

            Image::make(storage_path('app/products/' . $product->image))
                ->resize(270, 180)
                ->save(storage_path('app/products/' . $product->image));
        }
        $product->save();
    }
}
