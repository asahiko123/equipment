<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $table = 'facility_users';

    public function getFacilityUser(){

        return $this->all();
    }
}
