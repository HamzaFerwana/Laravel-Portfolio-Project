<?php

namespace App\Http\Controllers\site;

use App\Models\Work;
use App\Models\skill;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Validator;

class sitecontroller extends Controller
{
    public function index()
    {
        $skills = skill::all();
        $services = Service::all();
        $works = Work::all();
        $blogs = Blog::all();
        return view('site.index', compact('skills', 'services', 'works', 'blogs'));
    }
    public function blog($id)
    {
        $comments = Comment::where('blog_id', $id)->get();
        $commentsCount = Comment::where('blog_id', $id)->count();
        $blog = Blog::findOrFail($id);
        $otherBlogs = Blog::where('user_id', $blog->user_id)->where('id', '!=', $blog->id)->get();
        return view('site.blog-single', compact('blog', 'otherBlogs', 'comments', 'commentsCount'));
    }
    public function blog_comment_data(Request $request, $blogID)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'image' => 'nullable|image',
            'message' => 'required'
        ])->validate();
        $image = 'https://ui-avatars.com/api/?name=' . $request->name;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/comments', 'custom');
        }
        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image,
            'message' => $request->message,
            'blog_id' => $blogID
        ]);
        return redirect()->route('devfolio.blog', $blogID);
    }
    public function reply($blogID, $commentID) {
        $comment = Comment::findOrFail($commentID);
        $blog = Blog::findOrFail($blogID);
        return view('site.reply', compact('comment', 'blog'));
    }
    public function reply_data($blogID, $commentID, Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image',
            'message' => 'required'
        ]);
        $image = 'https://ui-avatars.com/api/?name=' . $request->name;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/replies', 'custom');
        }
        Reply::create([
            'name' => $request->name,
            'image' => $image,
            'email' => $request->email,
            'message' => $request->message,
            'blog_id' => $blogID,
            'comment_id' => $commentID
        ]);
        return redirect()->route('devfolio.blog', $blogID);
    }


}
