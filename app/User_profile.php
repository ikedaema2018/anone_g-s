<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class User_profile extends Model
{
    public function nigate_lists() {
        return $this->hasOne('App\NigateList', 'id', 'nigate_id');
    }
    
    // public function getData() {
    //     return $this->nigate_name;
    // }
}
