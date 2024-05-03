<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view('admin.service_types.index', compact('serviceTypes'));
    }


    public function create()
    {
        return view('admin.service_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        $serviceType = new ServiceType();
        $serviceType->name = $request->name;
        $serviceType->status = $request->status;
        $serviceType->save();

        // Redirect to the create page if you want to stay on the create page after successful creation
        // return redirect('/service_types/create')->with('success', 'Service Type created successfully.');

        // Redirect to the index page if you want to move to the index page after successful creation
        return redirect('/service_types')->with('success', 'Service Type created successfully.');
    }



    public function edit(ServiceType $serviceType)
    {
        return view('admin.service_types.edit', compact('serviceType'));
    }


    public function update(Request $request, ServiceType $serviceType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $serviceType->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('service_types.index')->with('success', 'Service Type updated successfully.');
    }


    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()->route('service_types.index')->with('success', 'Service Type deleted successfully.');
    }

}
