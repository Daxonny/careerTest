<?php

namespace App\Quiz\Admin;

use App\Quiz\Admin\Model\Countries;

use App\AInteractor;

class CSInteractor extends AInteractor{
	public function execute() {
		// dd(Countries::get());
		return Countries::get();
	}
}