<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Rules\WordsCountRule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest('id')->paginate(3);
        return view('admin.services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
        return redirect()->route('admin.services.index')->with(['msg' => 'Service added.', 'type' => 'success']);
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        $service->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description
        ]);
        return redirect()->route('admin.services.index')->with([
            'msg' => 'Service updated.',
            'type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::destroy($id);
        return redirect()->route('admin.services.index')->with(['msg' => 'Service deleted.', 'type' => 'danger']);
    }
    public function accomplishments() {
        return view('admin.services.accomplishments');
    }
    public function accomplishments_data(Request $request) {
        $validator = Validator::make($request->all(), [
            'worksCompleted' => 'required|numeric|integer',
            'yearsOfExperience' => 'required|numeric|integer',
            'totalClients' => 'required|numeric|integer',
            'awardsWon' => 'required|numeric|integer',
        ])->validate();
        settings()->set('worksCompleted', $request->worksCompleted);
        settings()->set('yearsOfExperience', $request->yearsOfExperience);
        settings()->set('totalClients', $request->totalClients);
        settings()->set('awardsWon', $request->awardsWon);
        settings()->save();
        return redirect()->route('admin.accomplishments')->with(['msg' => 'Content changed.', 'type' => 'info']);
    }
}
