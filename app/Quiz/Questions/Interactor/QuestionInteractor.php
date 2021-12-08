<?php

namespace App\Quiz\Questions\Interactor;

use App\Quiz\Questions\Model\RandomizedQuestion;
use App\Quiz\Questions\Model\TranslatedQuestion;

class QuestionInteractor {

	public static function getQuestions($testId, $step, $lang) {
		return TranslatedQuestion::where('testId', $testId)
										->where('lang', $lang)
										->where('step', $step)
										->orderBy('orderNo')
										->get();
		// return TranslatedQuestion::where('testId', $testId)->get();				
	}

	public static function getNumberOfSteps($testId) {
		return RandomizedQuestion::where('testId', $testId)
										->max('step');
	}
}