<?php 

namespace App\Quiz\Admin;

use App\Quiz\Admin\Model\Users;
use App\Quiz\Admin\Model\UserRole;

class UserRepository {

	public function get() {
		return Users::get();
	}

	public function search($email) {
		return Users::where('email', $email)
			->orWhere('name', 'like', '%' . $email . '%')
			->get();
	}

	public function create($data) {
		$user = new Users();
		$user->name = $data->name;
		$user->email = $data->email;
		$user->schoolId = $data->school;
		$user->countryId = $data->country;
		$user->save();
		return $user->id;
	}
	public function delete($id) {
		return Users::where('id', $id)->delete();
	}

	public function find($field, $value) {
        return Users::where($field, '=', $value)->whereNull('deleted_at')->get();
    }

	public function addRole($userId, $roleId) {
		$userRole = new UserRole();
		$userRole->userId = $userId;
		$userRole->roleId = $roleId;
		$userRole->save();
	}

}