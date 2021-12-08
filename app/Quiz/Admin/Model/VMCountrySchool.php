<?php

namespace App\Quiz\Admin\Model;

use App\Quiz\Admin\UserInteractor;
use App\Quiz\Admin\CSInteractor;
use App\AVM;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Country {
	public $id;
	public $name;

}
class User {
	public $id;
	public $name;
	public $email;
	public $country;
	public $school;
}

class VMCountrySchool extends AVM { 

	public $countries=[];
	public $users=[];
	// public $vm=[];

	protected function _execute() {
		$dataCounties = (new CSInteractor())->execute();
		// dd($dataCounties);
		foreach($dataCounties as $country) {
			$c = new Country();
			$c->id			= $country->id;
			$c->name		= $country->name;
			$this->countries[] = $c;
		}
		$dataUsers = (new UserInteractor())->execute();
		// dd($dataUsers);
		foreach($dataUsers as $user) {
			$c = new User();
			$c->id			= $user->id;
			$c->name		= $user->name;
			$c->email		= $user->email;
			$c->country		= $user->country;
			$c->school		= $user->school;
			$this->users[] = $c;
		}
		$this->users = $this->paginate($this->users);
		$this->users->setPath('');
		// dd($this);
		return $this;
	}

	public function paginate($items, $page = null, $options = [])
	{
		$perPage = \Config::get('ln.paginate');
		$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}

}
