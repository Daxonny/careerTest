<?php 

namespace App\Quiz\Admin;

use App\Quiz\Admin\Model\Answers;

class AnswersRepository {

	public function get($id, $lang) {
		return Answers::join('questionsTr', 'questionsTr.questionId', '=', 'answers.questionId')
		->where('testId', $id)->where('languageId', $lang)
		->get();
	}

}