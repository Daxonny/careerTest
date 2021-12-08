<?php

namespace App\Quiz\Admin\Login;

use App\AInteractor;
use Cookie;

class LogoutInteractor extends AInteractor {

	public function execute() {
		Cookie::queue(
            Cookie::forget('token')
        );
		return redirect()->route('login');
	}
}