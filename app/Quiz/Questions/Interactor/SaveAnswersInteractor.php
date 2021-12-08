<?php

namespace App\Quiz\Questions\Interactor;

use App\Quiz\Questions\Model\Test;
use App\Quiz\Questions\Model\Answer;

class SaveAnswersInteractor {
    public static function updateStep($testId, $step) {
        $update = new Test();
        $update->where('id', $testId)->update(['currentStep' => $step]);
    }
    public static function saveAnswer($testId, $answersId) {
        $toBeInserted = [];
        collect($answersId)->map(function ($id) use ($testId, &$toBeInserted) {
            $RQRow = new Answer();
            $RQRow->testId = $testId;
            $RQRow->questionId = $id;
            // dd($RQRow);
            $toBeInserted[] = $RQRow->toArray();
			return true;
        });
        Answer::insert($toBeInserted);
    }

}