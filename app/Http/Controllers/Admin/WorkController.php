<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::paginate(2);
        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
            'title' => 'required|unique:works,title',
            'category' => 'required',
            'completionDate' => ['required', 'before:' . now()]
        ])->validate();
        $image = $request->file('image')->store('uploads/works', 'custom');
        DB::table('works')->insert([
            'image' => $image,
            'title' => $request->title,
            'category' => $request->category,
            'completionDate' => $request->completionDate
        ]);
        return redirect()->route('admin.works.index')->with(['msg' => 'Work added.', 'type' => 'success']);
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
        $work = Work::findOrFail($id);
        return view('admin.works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $work = Work::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image',
            'title' => 'required',
            'category' => 'required',
            'completionDate' => ['required', 'before:' . now()]
        ])->validate();
        $image = $work->image;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/works', 'custom');
        }
        $work->update([
            'image' => $image,
            'title' => $request->title,
            'category' => $request->category,
            'completionDate' => $request->completionDate
        ]);
        return redirect()->route('admin.works.index')->with(['msg' => 'Word updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Work::destroy($id);
        return redirect()->route('admin.works.index')->with('msg', 'Work deleted.')->with('type', 'danger');
    }
}
