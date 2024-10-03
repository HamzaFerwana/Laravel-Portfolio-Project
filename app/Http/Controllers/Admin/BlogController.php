<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Rules\WordsCountRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest('id')->paginate(2);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'category' => 'required',
            'content' => ['required', new WordsCountRule(4)]
        ]);
        $image = $request->file('image')->store('uploads/blogs', 'custom');
        $blog = new Blog();
        $blog->image = $image;
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->content = $request->content;
        $blog->user_id = Auth::id();
        $blog->save();
        return redirect()->route('admin.blogs.index')->with(['msg' => 'Blog added.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $request->validate([
            'image' => 'nullable|image',
            'title' => 'required',
            'category' => 'required',
            'content' => ['required', new WordsCountRule(4)]
        ]);
        $image = $blog->image;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/blogs', 'custom');
        }
        $blog->update([
            'image' => $image,
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content
        ]);
        return redirect()->route('admin.blogs.index')->with(['msg' => 'Blog updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect()->route('admin.blogs.index')->with(['msg' => 'Blog deleted.', 'type' => 'danger']);
    }
}
