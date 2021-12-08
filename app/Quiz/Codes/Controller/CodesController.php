<?php

namespace App\Quiz\Codes\Controller;

use App\Http\Controllers\Controller;

class CodesController extends Controller
{
    public function index() {
        return view('Codes.View.enter-code');
    }
}