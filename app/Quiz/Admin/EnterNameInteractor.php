<?php

namespace App\Quiz\Admin;

use App\AInteractor;
use App\Quiz\Admin\TestRepository;

class TestData {
		public $code;
		public $currentStep;
		public $userId;
		public $schoolId;
		public $countryId;
}

class EnterNameInteractor extends AInteractor{

	public $codes = [];

	public function execute() {
		$name = request()->input('name');
		$id = request()->route()->parameter('id');
		// dd($id);
		$repository = new TestRepository();
		$repository->update($id, $name);
	}
}