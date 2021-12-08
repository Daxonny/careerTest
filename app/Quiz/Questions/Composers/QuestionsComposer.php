<?php

namespace App\Quiz\Questions\Composers;

use Illuminate\View\View;

use App\Quiz\Questions\Interactor\QuestionInteractor;
use App\Quiz\Questions\Interactor\PrefixInteractor;
use App\Quiz\Questions\ViewModel\QuestionVM;
use Illuminate\Support\Facades\Cookie;

class QuestionsComposer {

	public function compose(View $view) {

		$step = request()->route()->parameter('step');
		$lang = \App::getLocale();
		$testId = (Cookie::get('testId'));
		
		$dbQuestions = QuestionInteractor::getQuestions($testId, $step, $lang);
		$numOfSteps = QuestionInteractor::getNumberOfSteps($testId);
		$questions = [];
		// dd($dbQuestions);
		foreach ($dbQuestions as $value) {
			$question = new QuestionVM();
			$question->id = $value->id;
			$question->question = $value->question;
			$questions[] = $question;
			
		}
		$prefix = PrefixInteractor::get($dbQuestions[0]->prefixId, $lang);
		// dd($dbQuestions[0]->prefixId);
		if( $step == $numOfSteps) {
			$view->with('finish', __('global.finish'));
		}
		// dd($questions);
		$view->with('questions', $questions);
		$view->with('prefix', $prefix[0]->text);
		$view->with('step', $step);
		$view->with('maxStep', $numOfSteps);
	}
}