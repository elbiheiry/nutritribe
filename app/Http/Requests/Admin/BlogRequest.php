<?php

namespace App\Http\Requests\Admin;

use App\Blog;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogRequest extends FormRequest
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
            'image' => $this->routeIs('admin.blog') ? 'required|max:2048' : 'max:2048',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => $this->routeIs('admin.blog') ? 'Please upload blog image' : '',
            'image.max' => 'Package image should be less than 2MB',
            'title.required' => 'Please enter blog title',
            'description.required' => 'Please enter blog description',
            'tags.required' => 'Please enter blog tags'
        ];
    }

    //add new blog
    public function store()
    {
        $blog = new Blog();

        $blog->title = $this->title;
        $blog->slug = Blog::whereSlug(Str::slug($this->title))->exists() ? Str::slug($this->title).'-1' : Str::slug($this->title);
        $blog->description = $this->description;
        $blog->tags = $this->tags;

        $this->image->store('blog');
        $blog->image = $this->image->hashName();
        Image::make(storage_path('app/blog/'.$blog->image))
            ->resize(775 , null , function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(storage_path('app/blog/'.$blog->image));
        Image::make(storage_path('app/blog/'.$blog->image))
            ->resize(350, 210)
            ->save(storage_path('app/blog/thumbnail/'.$blog->image));

        $blog->save();
    }

    //edit blog
    public function edit($id)
    {
        $blog = Blog::find($id);

        $blog->title = $this->title;
        $blog->slug = Blog::whereSlug(Str::slug($this->title))->where('id' , '!=' , $id)->exists() ? Str::slug($this->title).'-1' : Str::slug($this->title);
        $blog->description = $this->description;
        $blog->tags = $this->tags;

        if ($this->image) {
            @unlink(storage_path('app/blog/'.$blog->image));
            @unlink(storage_path('app/blog/thumbnail/'.$blog->image));

            $this->image->store('blog');
            $blog->image = $this->image->hashName();
            Image::make(storage_path('app/blog/' . $blog->image))
                ->resize(775 , null , function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app/blog/' . $blog->image));
            Image::make(storage_path('app/blog/'.$blog->image))
                ->resize(350, 210)
                ->save(storage_path('app/blog/thumbnail/'.$blog->image));
        }

        $blog->save();
    }
}
