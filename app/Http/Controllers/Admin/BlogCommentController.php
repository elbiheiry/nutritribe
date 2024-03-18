<?php

namespace App\Http\Controllers\Admin;

use App\BlogComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    //
    public function getIndex($id)
    {
        $comments = BlogComment::where('blog_id' , $id)->get();

        return view('admin.pages.blog.comments' ,compact('comments'));
    }

    public function getDelete($id)
    {
        $comment = BlogComment::find($id);

        $comment->delete();

        return redirect()->back();
    }
}
