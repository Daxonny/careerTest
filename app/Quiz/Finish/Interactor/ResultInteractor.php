<?php

namespace App\Quiz\Finish\Interactor;
use App\Quiz\Finish\Repository\ResultRepository;
use Illuminate\Support\Facades\Cookie;

class ResultInteractor {
    public static function execute() {
        $testId = (Cookie::get('testId'));
        $lang = \App::getLocale();
        $repository = new ResultRepository;
        return $repository->getCategory($testId, $lang);
    }
}