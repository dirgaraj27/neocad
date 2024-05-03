<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseRecord;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CaseController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $cases = CaseRecord::with('user', 'serviceType', 'service')->get();
        return view('admin.cases.index', compact('cases'));
    }

    // Show the form for creating a new resource.
    public function getServices($serviceType)
    {
        $services = Service::where('service_type_id', $serviceType)->get();
        return response()->json($services);
    }

    public function getServicePrice($serviceId)
{
    $service = Service::findOrFail($serviceId);
    return response()->json(['price' => $service->price]);
}
    public function create()
    {
        $users = User::where('role', 1)->get(); // Retrieve users with role 1
        $serviceTypes = ServiceType::all();
        $services = Service::all();

        return view('admin.cases.create', compact('users', 'serviceTypes', 'services'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'patient_name' => 'required|string|max:255',
            'service_type_id' => 'required|exists:service_types,id',
            'service_id' => 'required|exists:services,id',
            'due_date' => 'required|date',
            'tooth' => 'required|string|max:255',
            'stump_shade' => 'required|string|max:255',
            'final_shade' => 'required|string|max:255',
            'case_type' => 'required|in:Digital Case,Physical',
            'pickup' => 'required|in:Yes,No',
            'pickup_note' => 'nullable|string|max:255',
            'pickup_date' => 'nullable|date',
            'doctor_note' => 'required|string',
            'total_cost' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new CaseRecord instance
        $caseRecord = new CaseRecord();

        // Assign request data to the CaseRecord instance
        $caseRecord->user_id = $request->user_id;
        $caseRecord->doctor_name = $request->doctor_name;
        $caseRecord->gender = $request->gender;
        $caseRecord->patient_name = $request->patient_name;
        $caseRecord->service_type_id = $request->service_type_id;
        $caseRecord->service_id = $request->service_id;
        $caseRecord->due_date = $request->due_date;
        $caseRecord->tooth = $request->tooth;
        $caseRecord->stump_shade = $request->stump_shade;
        $caseRecord->final_shade = $request->final_shade;
        $caseRecord->case_type = $request->case_type;
        $caseRecord->pickup = $request->pickup;
        $caseRecord->pickup_note = $request->pickup_note;
        $caseRecord->pickup_date = $request->pickup_date;
        $caseRecord->doctor_note = $request->doctor_note;
        $caseRecord->total_cost = $request->total_cost;

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $request->file('image')->storeAs('cases', $imageName, 'public');
            $caseRecord->image = $imageName;
        }

        // Set status value
        $caseRecord->status = 'new';
        // Save the CaseRecord instance
        $caseRecord->save();
        // Redirect back with a success message
        return redirect()->route('admin.cases.index')->with('success', 'Case created successfully.');
    }

    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    //Show the form for editing the specified resource.

    public function edit(string $id)
    {
        //
    }

    //Update the specified resource in storage.

    public function update(Request $request, string $id)
    {
        //
    }

    //Remove the specified resource from storage.
    public function destroy(string $id)
    {
        //
    }
}
