<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StatusController extends Controller
{
    public function update(int $userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->status = ($user->status === 0) ? 1 : 0;
            $user->save();
        
            if ($user->status) {
              // User is now active (optional logic here)
              session()->flash('success', 'User activated successfully.');
            } else {
              // User is now inactive (optional logic here)
              session()->flash('success', 'User deactivated successfully.');
            }
            
            return back();
          }
   
    }
}
