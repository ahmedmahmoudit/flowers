<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function managerDashboard()
    {
        return view('backend.manager.dashboard');
    }

    public function adminDashboard()
    {
        return view('backend.manager.dashboard');
    }
}
