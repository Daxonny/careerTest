<?php

namespace App\Http\View\Composers;

use App\School;
use Illuminate\View\View;

class SchoolsComposer {
    public function compose(View $view) {
        $view->with('schools', School::get());
    }
}