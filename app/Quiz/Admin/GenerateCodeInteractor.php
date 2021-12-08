<?php

namespace App\Quiz\Admin;

use App\AInteractor;
use Illuminate\Support\Str;
use App\Quiz\Admin\TestRepository;

class TestData {
		public $code;
		public $currentStep;
		public $userId;
		public $schoolId;
		public $countryId;
}

class GenerateCodeInteractor extends AInteractor{

	public $codes = [];

	public function execute() {
		$token = json_decode(request()->cookie('token'));
		// dd($token);
		request()->validate([
			'codesNumber' => 'numeric|max:100'
		]);
		$codesNumber = request()->input('codesNumber');
		$repository = new TestRepository();
		for($i=0; $i<$codesNumber; $i++) {
			$code = Str::random(6);
			$data = new TestData();
			$data->code = $code;
			$data->currentStep = 1;
			$data->userId = $token->users_id;
			$data->schoolId = $token->schoolId;
			$data->countryId = $token->countryId;
			$this->codes[]=$code;
			$repository->create($data);
		}
		// dd($this->codes);
		request()->session()->flash('code', $this->codes);

	}
}