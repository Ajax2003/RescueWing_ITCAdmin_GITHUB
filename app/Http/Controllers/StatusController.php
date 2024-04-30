<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StatusController extends Controller
{
    public function update(int $userId) // Use $userId instead of $id
    {
        $user = User::find($userId);
    
        if ($user) {
            $user->status = ($user->status === 1) ? 0 : 1; // Toggle status
            $user->save(); // Save the changes to the user model
    
            // Handle success or error (optional)
            return redirect()->back()->with('success', 'User status toggled successfully!');
        } else {
            // Handle user not found scenario (optional)
            return back()->with('error', 'User not found!');
        }
    }
}
