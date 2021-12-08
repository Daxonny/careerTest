<?php

namespace App\Quiz\Admin\Login;

use App\AInteractor;

class IsLoggedInteractor extends AInteractor {

	public function execute() {
		if(request()->cookie('token')) {
			return true;
		}
    }
}