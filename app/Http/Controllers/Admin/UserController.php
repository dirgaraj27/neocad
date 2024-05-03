<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::where('role', '!=', 0);

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:0,1,2',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // Assuming max file size is 2MB
            'status' => 'required|boolean',
        ]);

        // Create a new user instance
        $user = new User();

        // Assign request data to the user instance
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->status = $request->status;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->image = $imagePath;
        }

        // Save the user instance to the database
        $user->save();


        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'User created successfully.');
        //return redirect('/users')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:0,1,2',
            'address' => 'nullable|string|max:255', // Removed 'required'
            'state' => 'nullable|string|max:255', // Removed 'required'
            'city' => 'nullable|string|max:255', // Removed 'required'
            'zipcode' => 'nullable|string|max:20', // Removed 'required'
            'country' => 'nullable|string|max:255', // Removed 'required'
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048', // Removed 'required'
        ]);

        if ($request->hasFile('image')) {
            // Handle image upload
            $imagePath = $request->file('image')->store('user_images', 'public');
            $validatedData['image'] = $imagePath;
        }


        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Remove password field from validation data if not provided
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateStatus(Request $request, User $user)
    {
        // Update user status
        // Redirect
    }
}
