<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\skill;
use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function intro_skew()
    {
        return view('admin.intro-skew.index');
    }
    public function intro_skew_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image',
            'title' => 'required',
            'subtitle' => 'required|regex:/^[a-zA-Z\s,]*$/'

        ]);
        $validator->validate();
        $image = settings()->get('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/intro-skew', 'custom');
        }
        settings()->set('title', $request->title);
        settings()->set('subtitle', $request->subtitle);
        settings()->set('image', $image);
        settings()->save();
        return redirect()->route('admin.intro-skew')->with('msg', 'Content changed')->with('type', 'info');
    }
    public function about_me()
    {
        return view('admin.about-me.index');
    }
    public function about_me_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image',
            'name' => 'required',
            'profile' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required'
        ])->validate();
        $image = settings()->get('aboutMeImage');
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads/about-me', 'custom');
        }
        settings()->set('aboutMeImage', $image);
        settings()->set('name', $request->name);
        settings()->set('profile', $request->profile);
        settings()->set('email', $request->email);
        settings()->set('phone', $request->phone);
        settings()->set('description', $request->description);
        settings()->save();
        return redirect()->route('admin.about-me')->with('msg', 'Content changed.')->with('type', 'info');
    }
    public function skills_data(Request $request) {
        $request->validate([
            'skillName' => 'required',
            'percentage' => 'required|numeric|min:0|max:100'
        ]);
        skill::create([
            'name' => $request->skillName,
            'percentage' => $request->percentage
        ]);
        return redirect()->route('admin.about-me')->with('msg', 'Skill Added.')->with('type', 'success');
    }

    public function ed_skills() {
        $skills = skill::all();
        return view('admin.about-me.skills', compact('skills'));
    }
    public function delete_skill($id) {
        skill::destroy($id);
        return redirect()->route('admin.ed-skills')->with('msg', 'Skill deleted.')->with('type', 'danger');
    }
    public function edit_skill($id) {
        $skill = skill::findOrFail($id);
        return view('admin.about-me.edit', compact('skill'));
    }

    public function edit_skill_data($id, Request $request) {
        $skill = skill::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'percentage' => 'required|min:0|max:100|numeric'
        ]);
        $skill->update([
            'name' => $request->name,
            'percentage' => $request->percentage
        ]);
        return redirect()->route('admin.ed-skills')->with('msg', 'Skill updated.')->with('type', 'info');
    }
    public function notify(Request $request) {
        $user = User::findOrFail(1);
        $user->notify(new NewNotification('Title', 'Content'));
        return redirect()->route('admin.index');
    }
    public function read_notification($id) {
        DatabaseNotification::findOrFail($id)->markAsRead();
        return redirect()->route('admin.index');
    }
}
