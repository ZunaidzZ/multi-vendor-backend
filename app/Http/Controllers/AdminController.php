<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        return response()->json(['message' => 'Welcome to the Admin Dashboard']);
    }
}