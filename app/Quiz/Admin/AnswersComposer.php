<?php
namespace App\Quiz\Admin;

use Illuminate\View\View;
use App\Quiz\Admin\Model\VMAnswers;


class AnswersComposer {
	public function compose(View $view) {
        $vm=new VMAnswers();
        // dd($vm);
        $view->with('vm', $vm);
	}
}
