<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function matrice()
    {
        return view('matrice');
    }

    public function geo()
    {
        return view('geo');
    }

}
