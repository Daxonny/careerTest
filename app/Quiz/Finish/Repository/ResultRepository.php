<?php

namespace App\Quiz\Finish\Repository;
use App\Quiz\Finish\Model\Answers_v;

class ResultRepository {
    public static function getCategory ($testId, $lang) {
        return Answers_v::where('testId', $testId)->join('personalityTr', 'v_categorybyanswers.categoryId', '=', 'personalityTr.categoryId')
        ->where('languageId', $lang)
        ->orderBy('total','desc')->first();
    }
}