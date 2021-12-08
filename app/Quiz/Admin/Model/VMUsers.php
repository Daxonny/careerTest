<?php

namespace App\Quiz\Admin\Model;

use App\Quiz\Admin\UserInteractor;
use App\AVM;

class User {
    public $id;
    public $name;
    public $email;
    public $country;
    public $school;
}
class VMUsers extends AVM { 

    public $users=[];


	protected function _execute() {
        $data = (new UserInteractor())->execute();
        dd($data);
		foreach($data as $user) {
			$c = new Country();
            $c->id			= $user->id;
            $c->name		= $user->name;
            $this->users[] = $c;
        }
        return $this->users;
    }

}
