<?php

namespace App\Quiz\Questions\Interactor;

use App\Quiz\Questions\Model\Test;

class StepInteractor {
    public static function getRealStep($testId) {
        return Test::select('currentStep')
                            ->where('id', $testId)
                            ->first();
    }
}