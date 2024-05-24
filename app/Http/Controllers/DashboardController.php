<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function aboutMe() {
        return view('pages.user.dashboard');
    }
    
    public function myProjects() {
        return view('pages.user.myProjects');
    }
}
