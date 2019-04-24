<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppGroup extends Model
{
    protected $primaryKey = 'GroupID';

    

    public function agents() {
        return $this->hasMany('App\User', 'GroupID', 'GroupID');
     }


     public function workFlows() {
        return $this->hasMany('App\WizMobAppWorkFlow', 'GroupID', 'GroupID');
     }


}
