<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lending extends Model
{
    protected $table = 'lendings';

    public function getLendingGroupByOptgroup(){

        return $this->all()->groupBy('optgroup_id');
    }

    public function getOptGroupName(){

        return DB::table('lendings')->select('optgroup_id')->groupBy('optgroup_id')->get();
    }


}
