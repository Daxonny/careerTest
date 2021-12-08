<?php

namespace App\Quiz\Admin;

use App\Quiz\Admin\Model\Users;
use App\Quiz\Admin\Model\Countries;
use App\Quiz\Admin\Model\School;
use App\Quiz\Admin\UserRepository;

use App\AInteractor;

class UserInteractor extends AInteractor {
	public function execute() {
        $repository = new UserRepository();
        if(request()->isMethod('post')) {
            $data = $repository->search(request()->input('search'));
        } else {
            $data = $repository->get();
        }
        // dd($data);
        foreach($data as $user) {
            $user->country		= self::findCountry($user->countryId);
            $user->school	    = self::findSchool($user->schoolId);
        }
        return $data;
    }
    
    public function findCountry($id) {
        $data = Countries::select('name')->where('id', $id)->first();
        return $data->name;
    }
    public function findSchool($id) {
        $data = School::select('name')->where('id', $id)->first();
        return $data->name;
    }
}