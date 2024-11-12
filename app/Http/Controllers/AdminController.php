<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Display a listing of admins
    public function index()
    {
        $admins = User::where('is_admin', true)->get();
        $totalAdmins = User::where('is_admin', true)->count();
        return view('backend.admins.index', compact('admins','totalAdmins'));
    }

    // Show the form to create a new admin
    public function create()
    {
        return view('backend.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8', 
        ]);
    
        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'is_admin' => true,
            ]);
            return response()->json(['success' => 'Admin created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred. Please try again.'], 500);
        }
    }
    
    // Display the specified admin details
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('backend.admins.show', compact('admin'));
    }

    // Show the form to edit the specified admin
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('backend.admins.edit', compact('admin'));
    }

// Update the specified admin in the database
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    $admin = User::findOrFail($id);
    $admin->name = $validated['name'];
    $admin->email = $validated['email'];

    $admin->save();

    // Check if the request is AJAX
    if ($request->ajax()) {
        return response()->json(['success' => 'Admin updated successfully.']);
    }

    // For non-AJAX request, redirect with a success message
    return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
}


    // Delete the specified admin from the database
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
    }
}
