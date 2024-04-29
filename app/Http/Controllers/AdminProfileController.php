<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function edit(string $id)
    {
        $title ="Update User";
        $edit = User::findOrFail($id);
        return view('admin.adminprofile', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $edit = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|same:password' // Adjust as needed (optional/mandatory)
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
    
        $user->save();
    
        Session::flash('success', 'Admin Updated Successfully!');
        return redirect()->route('admin.adminprofile');
    }
}
