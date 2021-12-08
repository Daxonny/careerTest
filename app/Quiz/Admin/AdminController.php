<?php

namespace App\Quiz\Admin;

use App\Http\Controllers\Controller;
use App\Quiz\Admin\Model\School;
use App\Quiz\Admin\UserRepository;
use App\Quiz\Admin\AddUserInteractor;
use App\Quiz\Admin\GenerateCodeInteractor;
use App\Quiz\Admin\Login\LoginInteractor;
use App\Quiz\Admin\Login\LogoutInteractor;
use App\Quiz\Admin\RequestLogin\RequestLoginInteractor;
use App\Quiz\Admin\EnterNameInteractor;

class AdminController extends Controller
{
	public function admin() {
		return view('Admin.View.teachers');
	}
	public function store() {
		$addUser = new AddUserInteractor();
		$addUser->execute();
		return redirect()->route('admin');		
	}

	public function students() {
		return view('Admin.View.students');
	}

	public function enterName() {
		$enterName = new EnterNameInteractor();
		$enterName->execute();
		return redirect()->route('students');
	}

	public function answers() {
		return view('Admin.View.answers');
	}

	public function studentsRes() {
		return view('Admin.View.result');
	}

	public function schools($id) {
		$empData['data'] = School::orderby("name","asc")
		->select('id','name')
		->where('countryId',$id)
		->get();

		return response()->json($empData);
	}
	public function removeUser($id) {
		$repository = new UserRepository();
		$repository->delete($id);
		return redirect()->route('admin');
	}

	public function generate() {
		$generate = new GenerateCodeInteractor();
		$generate->execute();

		return redirect()->route('students');
	}

	public function login() {
		if (request()->isMethod('post')) {	
			$request = new RequestLoginInteractor();
			return $request->execute();
		}
		return view('Admin.RequestLogin.View.login.html');
	}
	public function confirm() {
		return view('Admin.RequestLogin.View.confirm-email.html');
	}
	public function confirmToken() {
		$login = new LoginInteractor();
		return $login->execute();
	}
	public function invalidToken() {
		return view('Admin.Login.View.invalid-token');
	}
	public function logout() {
		$login = new LogoutInteractor();
		return $login->execute();
	}
}