<?php

namespace App\Quiz\Admin;

use App\Quiz\Admin\AnswersRepository;

use App\AInteractor;

class AnswersInteractor extends AInteractor{
    public $answers= [];

	public function execute() {
        $id = request()->route()->parameter('id');
        $lang = \App::getLocale();
		$repo = new AnswersRepository();
        $data = $repo->get($id, $lang);
        foreach($data as $item) {
            $this->answers[] = $item->question;
        }
        return $this;
	}
}