<?php

namespace App\Quiz\Admin;

use App\AInteractor;
use App\Quiz\Admin\UserRepository;

class Data {
	public $country;
	public $school;
	public $name;	
	public $email;
}

class AddUserInteractor extends AInteractor{
   
	public function execute() {
        $data = new Data();
		$data->country = request()->input('country');
		$data->school = request()->input('school');
		$data->name = request()->input('name');
		$data->email = request()->input('email');
		$repository = new UserRepository();
		$id = $repository->create($data);
        // dd($id);
        if(request()->input('role')) {
            $role = 1;
        } 
        else $role = 2;
        // dd($role);
        $repository->addRole($id, $role);
	}
}