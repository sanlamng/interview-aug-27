<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page['title'] = "Dashboard";
        $page['description'] = "Account Overview";
        return view('user.dashboard', compact('page'));
    }
}
