<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
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
            $imagePath = $request->file('image')->store('images/users', 'public');
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
        // Validation
        // Update user
        // Redirect
    }

    public function destroy(User $user)
    {
        // Delete user
        // Redirect
    }

    public function updateStatus(Request $request, User $user)
    {
        // Update user status
        // Redirect
    }
}
