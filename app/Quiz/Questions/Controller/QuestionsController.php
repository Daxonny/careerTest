<?php

namespace App\Quiz\Questions\Controller;

use App\Http\Controllers\Controller;
use App\Quiz\Questions\Interactor\PrepareInteractor;
use App\Quiz\Questions\Interactor\SaveAnswersInteractor;
use App\Quiz\Questions\Interactor\StepInteractor;
use App\Quiz\Questions\Interactor\QuestionInteractor;
use Illuminate\Support\Facades\Cookie;

class QuestionsController extends Controller
{
	public function start()
	{
		request()->validate([
			'codeInput' => 'required'
		]);

		$code = request()->get('codeInput');
		$currentStep = PrepareInteractor::run($code);
		$testId = PrepareInteractor::getTestId($code)[0]->id;
		return redirect()->route('questions', ['step' => $currentStep])->cookie('testId', $testId);
	}
	public function index($step)
	{
		$testId = (Cookie::get('testId'));
		$answers = []; 
		// dd($testId);
		$realStep = StepInteractor::getRealStep($testId)->currentStep;
		$maxStep = QuestionInteractor::getNumberOfSteps($testId);
		if ($realStep != $step) {
			return redirect()->route('questions', ['step' => $realStep]);
		}
		if ($step > $maxStep) {
			return redirect()->route('finish');
		}

		$answers = request()->input('answer');
		// dd($answers);
		if (request()->isMethod('post')) {
			if(!$answers) {
				return redirect()->route('questions', ['step' => $realStep]);
			}
			if ($step < $maxStep) {
				$step = $step+1;
				SaveAnswersInteractor::updateStep($testId, $step);
				SaveAnswersInteractor::saveAnswer($testId, $answers);
				return redirect()->route('questions', ['step' => $step]);
			}
			else {
				$step = $step+1;
				SaveAnswersInteractor::updateStep($testId, $step);
				return redirect()->route('finish');
			}
		}
		return view('Questions.View.questions');
	}

}
