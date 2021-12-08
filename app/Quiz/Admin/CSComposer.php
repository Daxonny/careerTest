<?php
namespace App\Quiz\Admin;

use Illuminate\View\View;
use App\Quiz\Admin\Model\VMCountrySchool;


class CSComposer {
	public function compose(View $view) {
        $vm=new VMCountrySchool();
        // dd($vm);
        $view->with('vm', $vm);
	}
}
