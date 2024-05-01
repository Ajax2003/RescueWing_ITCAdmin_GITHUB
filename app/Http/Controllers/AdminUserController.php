<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ArchivedUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest('id')->get();
        return view('admin.useradmin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add New User";
        return view('admin.add_user', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'usertype' => 'required|in:user,admin,barangay,facility',
            'password_confirmation' => 'required|same:password',// Assuming you have a field named 'confirm_password' in your form
        ]);
    
        // Create a new user instance
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password), // Securely hash password
        ]);
    
        // Check if user creation was successful
        if ($user) {
            Session::flash('success', 'Admin registered successfully!');
            return redirect()->route('admin.useradmin');
        } else {
            Session::flash('error', 'Failed to register admin!');
            return back()->withInput(); // Redirect back with input data if registration fails
        }
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
        $title ="Update User";
        $edit = User::findOrFail($id);
        return view('admin.edit_user', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'usertype' => 'required|in:user,admin,barangay,facility',
           
        ]);
    
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        Session::flash('success', 'Admin Updated Successfully!');
        return redirect()->route('admin.useradmin');
    }
    
    public function softDelete($id) {
        User::findOrFail($id)->delete();
        return back();
    }




    public function destroy(string $id)
    {
        $userData = User::findOrFail($id);
        $userData->delete();

        Session::flash('success', 'Admin Deleted Successfully!');
        return redirect()->route('admin.useradmin');
    }

}