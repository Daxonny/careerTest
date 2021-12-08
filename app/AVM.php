<?php
namespace App;

abstract class AVM {
   public function __construct() {
      $this->_execute();
   }

   abstract protected function _execute();
}