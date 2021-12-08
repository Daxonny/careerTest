<?php 

namespace App\Quiz\Admin;

use Illuminate\Support\Facades\DB;

class Result {
	public $id;
	public $testCode;
	public $currentStep;
	public $code;
	public $name;
}

class ResultRepository {
    public $results = [];
	public function get($id) {
		$data = DB::table('tests')->select('id', 'tests.code as testCode', 'tests.name as name', 'currentStep', 'total', 'v_categorybyanswers.code', 'userId')
		->leftJoin('v_categorybyanswers', 'tests.id', '=', 'v_categorybyanswers.testId')
		->where('userId', $id)
        ->orderByDesc('id')
		->get();
		// dd($data);
        foreach($data as $d) {
			// dd($d);
			if(!array_key_exists($d->testCode, $this->results)) {
				$this->results[$d->testCode] = new Result();
				$this->results[$d->testCode]->id = $d->id;
				$this->results[$d->testCode]->currentStep = $d->currentStep;
				$this->results[$d->testCode]->testCode = $d->testCode;
				$this->results[$d->testCode]->name = $d->name;
			}
			$this->results[$d->testCode]->code .= $d->code;
		}
		return $this->results;
	}

	public function find($id, $lang) {
		return DB::table('personalityTr')->select('tests.code', 'tests.name', 'result', 'currentStep', 'tests.id')
        ->join('v_categorybyanswers', 'personalityTr.categoryId', '=', 'v_categorybyanswers.categoryId')
		->join('tests', 'v_categorybyanswers.testId', '=', 'tests.id')
        ->where('tests.id', $id)
		->where('languageid', $lang)
		->orderByDesc('total')
		->orderBy('v_categorybyanswers.categoryId')
		->take(3)->get();;
	}

	public function search($code) {
		$data = DB::table('tests')->select('id', 'tests.code as testCode', 'tests.name', 'currentStep', 'total', 'v_categorybyanswers.code')
        ->leftJoin('v_categorybyanswers', 'tests.id', '=', 'v_categorybyanswers.testId')
		->where('tests.code', $code)
        // ->orderBy('currentStep')
        ->orderByDesc('id')
		// ->orderByDesc('total')
		// ->orderBy('categoryId')
		->get();
		// dd($data);
        foreach($data as $d) {
			// dd($d);
			if(!array_key_exists($d->testCode, $this->results)) {
				$this->results[$d->testCode] = new Result();
				$this->results[$d->testCode]->id = $d->id;
				$this->results[$d->testCode]->currentStep = $d->currentStep;
				$this->results[$d->testCode]->testCode = $d->testCode;
				$this->results[$d->testCode]->name = $d->name;
			}
			$this->results[$d->testCode]->code .= $d->code;
		}
		return $this->results;
	}

}