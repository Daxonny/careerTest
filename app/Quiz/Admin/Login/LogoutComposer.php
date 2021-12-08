<?php

namespace App\Quiz\Admin\Login;

use Illuminate\View\View;
use App\Quiz\Admin\Model\VMLogout;

class LogoutComposer {
	public function compose(View $view) {
        $vm=new VMLogout();
        // dd($vm);
		$view->with('vm', $vm);
	}
}
