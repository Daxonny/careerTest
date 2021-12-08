<?php

namespace App\Quiz\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use SoftDeletes;
    protected $table = 'users_has_roles';
    const UPDATED_AT = null;
    const CREATED_AT = null;
}