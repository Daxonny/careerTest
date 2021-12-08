<?php
namespace App\Quiz\Admin;

use Illuminate\View\View;
use App\Quiz\Admin\Model\VMResultDesc;


class ResultDescComposer {
	public function compose(View $view) {
        $vm=new VMResultDesc();
        // dd($vm);
        $view->with('vm', $vm);
	}
}
