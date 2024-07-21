<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;
use Laravel\Ui\ControllersCommand;

class DashboardController extends ControllersCommand
{
    public function index(){
        // dd('dashboard');
        return view('users.dashboard');
    }
}
