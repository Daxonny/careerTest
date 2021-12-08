<?php

namespace App\Quiz\Admin\RequestLogin;

use App\AInteractor;
use stdClass;
use App\Quiz\Admin\RequestLogin\TokenRepository;
use App\Quiz\Admin\UserRepository;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;

class RequestLoginDetails {
	public string $email;
	public string $name;
	public string $expTime;
	public string $token;
}

class RequestLoginInteractor extends AInteractor {

	public function execute() {
            // dd("tuj sam");

			if(request()->cookie('token')) {
				return redirect()->route('admin');
			}

			request()->validate([
				'email' => 'required'
			]);

			$user = new stdClass();

			$tokenRepository = new TokenRepository();
			$token = new stdClass();
			
			$user->email = request()->get('email');
			$userDetails = self::getUserId($user);
			$user->name=$userDetails->name;
			$token->token = self::generateToken();
			$token->userId = $userDetails->id;
			$token->requestedFromIP = request()->ip();
			$token->expTime = \Config::get('ln.tokenValidity');
			$tokenRepository->create($token);
			self::sendEmail($user, $token);
		
		
		return redirect()->route('confirm')->cookie('userId', $token->userId, 1);
	}


	private static function getUserId($user) {
		$requestLoginRepository = new UserRepository();
		$exist = $requestLoginRepository->find('email', $user->email);
		
		if(count($exist) > 0) {
			return $exist[0];
		}
		else {
			abort('403', 'Email does not exist.');
		} 
	}

	public static function sendEmail($user, $token) {
		$link = route('confirm-token', ['token' => $token->token]);
		$details = new RequestLoginDetails();
		$details->email = $user->email;
		$details->name = $user->name==null ? "" : $user->name;
		$details->expTime = self::calcExpTime($token->expTime);
		$details->token = $link;
		Mail::to($user->email)->send(new ConfirmMail($details));
	}

	public static function generateToken() {
		$token = openssl_random_pseudo_bytes(16);
		$token = bin2hex($token);
		return $token;
    }
    
	public static function calcExpTime($expTime) {
		$expTime = explode(":", $expTime);
		$time = "";
		if($expTime[0]) {
			$time.=$expTime[0] . " hours ";
		}
		if($expTime[1]) {
			$time.=$expTime[1] . " minutes ";
		}
		if($expTime[2]) {
			$time.=$expTime[1] . " seconds ";
		}
		return $time;
	}

}