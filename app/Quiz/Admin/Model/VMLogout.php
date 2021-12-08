<?php

namespace App\Quiz\Admin\Model;

use App\AVM;
use App\Quiz\Admin\Login\IsLoggedInteractor;

class VMLogout extends AVM { 

	public $isLogged;
	public $lang;
    
	protected function _execute() {
		$this->lang = \App::getLocale();
		$this->isLogged = ( new IsLoggedInteractor())->execute();
		return $this;
	}

}