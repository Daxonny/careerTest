<?php

namespace App\Quiz\Admin\Login;

use App\Quiz\Admin\Model\Tokens;
use Illuminate\Support\Facades\DB;

class LoginRepository {
	public function find($field, $value) {
		return Tokens::select('token.id', 'token', 'token.created_at', 'exptime', 'users_id', 'email', 'name', 'schoolId', 'countryId', 'roleId')
							->where($field, '=', $value)
							->join('users', 'users.id', 'users_id')
							->join('users_has_roles', 'userId', 'users_id')
							->where('exptime', '>=', DB::raw('UTC_TIMESTAMP()'))
							->get();
	}
	
	public function update($id, $data) {
		$token = Tokens::find($id);
		$token->loggedFromIp = DB::Raw('INET_ATON("'. $data . '")');
		$token->save();
	}
}