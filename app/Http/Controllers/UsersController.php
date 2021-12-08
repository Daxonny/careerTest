<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsersController extends Controller
{
    public function show($name) {
        $user = User::where('name', $name)->first();
        if(!$user) {
            abort(404);
        }
        return view('user', compact('user'));
    }
    
    // public function index() {
    //     $users = User::all();
    //     return view('users', compact('users'));
    // }

    // public function create() {
    //     $schools = School::all();
    //     return view('create', compact('schools'));
    //     return view('create');
    // }

    public function index() {
        return view('users');
    }

    public function create() {
        return view('create');
    }
}
