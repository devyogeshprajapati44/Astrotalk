<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function indexdashboard(){

        return view('dashboard');      
            
    }

    public function showUsers()
{
    $users = User::count(); // Count the number of users
    return view('dashboard', compact('users')); // Pass the count to the view
}
    
}
