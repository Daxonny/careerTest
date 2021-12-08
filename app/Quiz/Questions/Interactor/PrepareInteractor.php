<?php

namespace App\Quiz\Questions\Interactor;

use App\Quiz\Questions\Model\Test;
use App\Quiz\Questions\Model\RandomizedQuestion;
use App\Quiz\Questions\Model\QuestionPrefix;
use App\Quiz\Questions\Model\Question;

class PrepareInteractor
{
	private static $autoIncrementId = 1;

	const QUESTIONS_PER_STEP = 14;

	public static function run(string $code): int
	{
		$test = Test::where('code', $code)->first();
		
		if (!$test) {
			abort('403', 'Code does not exist.');
			//dd("Kod ne postoi");
		}
		if (self::ifRandomized($test->id)) {
			return $test->currentStep;
		}
		self::randomize($test->id);
		return 1;
	}

	private static function ifRandomized(int $testId): bool
	{
		return (RandomizedQuestion::where('testId', $testId)->first()) ? true : false;
	}

	private static function randomize(int $testId): bool
	{
		$toBeInserted = [];

		$stepsPerPrefix = [];

		$prefixes = self::getPrefixes();
		collect($prefixes)->map(function ($prefix) use ($testId, &$toBeInserted, &$stepsPerPrefix) {

			$questions = Question::where('questionPrefixId', $prefix->id)
								->get()
								->shuffle();

			return collect($questions)->map(function ($question, $index)  use ($testId, &$toBeInserted, &$stepsPerPrefix, $prefix) {
				
				if (!key_exists($prefix->id, $stepsPerPrefix)) {
					$stepsPerPrefix[$prefix->id] = 0;
				}
				
				end($stepsPerPrefix);

				$offset = prev($stepsPerPrefix);
				//echo $offset;

				$RQRow = new RandomizedQuestion();
				$RQRow->testId = $testId;
				$RQRow->questionId = $question->id;
				$RQRow->orderNo = self::$autoIncrementId++;
				$RQRow->step = self::_setStep($index, $offset);
				//$RQRow->created_at = now();
				//dd($RQRow);
				$stepsPerPrefix[$prefix->id] = $RQRow->step;
				

				$toBeInserted[] = $RQRow->toArray();
				return true;
			});
		});

		RandomizedQuestion::insert($toBeInserted);
		return true;
	}

	private static function _setStep(int $index, int $offset): int {
		return floor($index / self::QUESTIONS_PER_STEP) + 1 + $offset;
	}

	private static function getPrefixes()
	{
		$prefixes = QuestionPrefix::get();
		return $prefixes;
	}

	public static function getTestId($code) {
		return Test::where('code', $code)->get();
	}

}
