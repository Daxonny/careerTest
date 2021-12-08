<?php

namespace App\Quiz\Admin\Model;

use App\Quiz\Admin\ResultDescInteractor;
use App\AVM;


class VMResultDesc extends AVM { 

    public $data;
    public $name;
	public $code;
    public $id;

	protected function _execute() {
        $data = (new ResultDescInteractor())->execute();
        $this->data = $data->results;
        $this->name = $data->name;
        $this->code = $data->code;
        $this->id = $data->id;
        // dd($this);
        return $this;
    }

}
