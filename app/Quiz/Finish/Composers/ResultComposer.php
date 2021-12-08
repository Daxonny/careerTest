<?php

namespace App\Quiz\Finish\Composers;

use App\Quiz\Finish\Interactor\ResultInteractor;
use Illuminate\View\View;


class ResultComposer {

	public function compose(View $view) {
		
		$vm = ResultInteractor::execute();
		// dd($vm);
		$view->with('vm', $vm);
	}
}