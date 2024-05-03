<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\ServiceType;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('serviceType')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceTypes = ServiceType::where('status', 1)->get();
        return view('admin.services.create', compact('serviceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'service_type_id' => 'required|exists:service_types,id',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        // Create a new service instance
        $service = new Service();

        // Assign request data to the service instance
        $service->name = $request->name;
        $service->service_type_id = $request->service_type_id;
        $service->price = $request->price;
        $service->status = $request->status;
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
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
    public function edit(Service $service)
    {
        $serviceTypes = ServiceType::where('status', true)->get();
        return view('admin.services.edit', compact('service', 'serviceTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'service_type_id' => 'required|exists:service_types,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'User deleted successfully.');
    }
}
