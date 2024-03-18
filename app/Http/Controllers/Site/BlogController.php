<?php

namespace App\Http\Controllers\Site;

use App\Blog;
use App\BlogComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getIndex()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->paginate(6);

        //load more function
        if (request()->ajax()) {
            $blogs = Blog::orderBy('id', 'DESC')->paginate(6, ['*'], 'page', \request()->page);

            return view('site.pages.blog.templates.blog', compact('blogs'));
        }

        return view('site.pages.blog.index', compact('blogs'));
    }

    public function getBlog($slug)
    {
        $blog = Blog::with('comments')->where('slug' , $slug)->first();

        $relates = Blog::where('id' , '!=' , $blog->id)->take(3)->inRandomOrder()->get();

        return view('site.pages.blog.single' ,compact('blog' , 'relates'));
    }

    public function postUpdateShare(Request $request , $id)
    {
        $blog = Blog::find($id);

        $blog->share += 1;

        $blog->save();

        return response()->json($blog->share , 200);
    }

    public function postComment(Request $request , $id)
    {
        $validation = validator($request->all() , [
            'comment' => 'required'
        ], [
            'comment.required' => 'Please enter your comment'
        ]);

        if ($validation->fails()){
            return response()->json($validation->errors()->first() , 500);
        }

        if (auth()->guest()){
            return response()->json('you must login first' , 500);
        }

        $comment = new BlogComment();

        $comment->user_id = auth()->id();
        $comment->blog_id = $id;
        $comment->comment = $request->comment;

        if ($comment->save())
        {
            $blog = Blog::find($id);

            return response()->json(view('site.pages.blog.templates.comments' , compact('blog'))->render() , 200);
        }
    }
}
