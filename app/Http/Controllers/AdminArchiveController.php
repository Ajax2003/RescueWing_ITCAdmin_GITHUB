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
        $users = User::all();
        return view('admin.adminarchive', compact('users'));
    }
}
