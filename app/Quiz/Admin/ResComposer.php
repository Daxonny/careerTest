<?php
namespace App\Quiz\Admin;

use Illuminate\View\View;
use App\Quiz\Admin\Model\VMResult;


class ResComposer {
	public function compose(View $view) {
        $vm=new VMResult();
        // dd($vm);
        $view->with('vm', $vm);
	}
}
