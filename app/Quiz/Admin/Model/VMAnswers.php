<?php

namespace App\Quiz\Admin\Model;

use App\Quiz\Admin\AnswersInteractor;
use App\AVM;

class VMAnswers extends AVM { 

    public $data;

	protected function _execute() {
        $data = (new AnswersInteractor())->execute();
        $this->data = $data->answers;
        // dd($data);
        return $this->data;
    }

}
