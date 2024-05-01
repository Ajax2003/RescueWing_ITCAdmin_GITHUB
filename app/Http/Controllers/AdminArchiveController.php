<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminArchiveController extends Controller
{
    public function index()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.adminarchive', compact('users'));
    }
    
    public function restore($id) {
        
        User::whereId($id)->restore();
        return back();
    }

    public function restoreAll($id) {
        
        User::onlyTrashed()->restore();
        return back();
    }

}
