<?php

namespace App\Quiz\Questions\Model;

use Illuminate\Database\Eloquent\Model;

class RandomizedQuestion extends Model
{
    protected $table = 'randomizedQuestions';
    const UPDATED_AT = null;
}