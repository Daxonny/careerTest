<?php

namespace App\Quiz\Admin;

use App\AInteractor;

class ResultInteractor extends AInteractor {
	public $results = [];

	public function execute() {
		$repository = new ResultRepository();
		if (request()->isMethod('post')) {
			$code = request()->input('search');
			return $repository->search($code);
		}
		$token = json_decode(request()->cookie('token'));
		return $repository->get($token->users_id);
	}
}