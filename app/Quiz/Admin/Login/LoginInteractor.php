<?php

namespace App\Quiz\Admin\Login;

use App\AInteractor;
use App\Quiz\Admin\Login\LoginRepository;
use Cookie;

class LoginInteractor extends AInteractor {

	public function execute() {
		$validToken=self::isValid();
		if(!$validToken) {
			return redirect()->route('invalid-token');
		}
		
		$token = new LoginRepository();
		$loggedFromIp = request()->ip();
		$token->update($validToken->id, $loggedFromIp);
		
		Cookie::queue('token', $validToken, 30*24*60);
		return redirect()->route('admin');
	}
	public static function isValid() {
		$token = request()->route()->parameter('token');
		$tokenRepository = new LoginRepository();
		$exist = $tokenRepository->find('token', $token);
		if(count($exist) > 0) {
			return $exist[0];
		} 
		return false;
	}
}