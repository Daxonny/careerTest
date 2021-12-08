<?php 

namespace App\Quiz\Admin;

use App\Quiz\Questions\Model\Test;

class TestRepository {

	public function create($data) {
		$test = new Test();
		$test->code = $data->code;
		$test->currentStep = $data->currentStep;
		$test->userId = $data->userId;
		$test->schoolId = $data->schoolId;
		$test->countryId = $data->countryId;
		$test->save();
	}

	public function update($id, $name) {
		$update = new Test();
        $update->where('id', $id)->update(['name' => $name]);
	}
}