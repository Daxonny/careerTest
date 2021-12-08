<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz\View;

class SchoolsController extends Controller
{
    public function index() {
        // $schools = School::all();
        // return view('schools', compact('schools'));
        return view('schools');
    }
}
