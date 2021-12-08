<?php

namespace App\Quiz\Finish\Controller;

use App\Http\Controllers\Controller;

class FinishController extends Controller
{
	public function index()
	{
		return view('Finish.View.finish');
	}

}
