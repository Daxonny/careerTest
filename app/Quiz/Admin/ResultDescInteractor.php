<?php

namespace App\Quiz\Admin;

use App\AInteractor;
use App\Quiz\Questions\Interactor\QuestionInteractor;

class Description {
	public $result;
	public $status;
}

class ResultDescInteractor extends AInteractor {
	public $results = [];
	public $name;
	public $code;
	public $id;

	public function execute() {
        $id = request()->route()->parameter('id');
        $lang = \App::getLocale();
		$repository = new ResultRepository();
		$data = $repository->find($id, $lang);
		// dd($data);
		if($data) {
			foreach($data as $item) {
				$desc = new Description();
				$this->id = $id;
				$this->name=$item->name;
				$this->code=$item->code;
				$desc->result=$item->result;
				$desc->status=self::isCompleted($item->id, $item->currentStep);
				// dd($desc);
				// return $desc;
				$this->results[] = $desc;
			}
		}
		// dd($this);
		return $this;
	}

	public static function isCompleted($testId, $currentStep) {
		$maxStep = QuestionInteractor::getNumberOfSteps($testId);
		if((int)$currentStep == 1 ) {
			return -1;
		}
		else if((int)$currentStep <= (int)$maxStep) {
			return 0;
		}
		return 1;
	}

}