<?php

namespace App\Quiz\Admin\Model;

use App\Quiz\Admin\ResultInteractor;
use App\AVM;
use App\Quiz\Questions\Interactor\QuestionInteractor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Result {
	public $id;
	public $testCode;
	public $name;
	public $status;
	public $code;
}
class VMResult extends AVM { 

	public $res=[];
	public $generatedCode;
	public $paginator;

	protected function _execute() {
		if(session('code')) {
			$this->generatedCode = session('code');
		}

		$data = (new ResultInteractor())->execute();
		foreach($data as $result) {
			// dd($result);
			$r = new Result();
			$r->id					= $result->id;
			$r->testCode			= $result->testCode;
			$r->name				= $result->name;
			$r->status				= self::isCompleted($result->id, $result->currentStep);
			$r->code			    = $r->status == 1 ? $result->code : null;
			$this->res[] = $r;
		}
		$this->res = $this->paginate($this->res);
		$this->res->setPath('');
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
	public function paginate($items, $page = null, $options = [])
    {
		$perPage = \Config::get('ln.paginate');
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
