<?php

namespace App\Quiz\Questions\Interactor;

use App\Quiz\Questions\Model\QuestionPrefixTr;

class PrefixInteractor {
    public static function get($id, $lang) {
        return QuestionPrefixTr::where('questionPrefixId', $id)->where('languageId', $lang)->get();
    }
}