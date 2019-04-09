<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppStatus extends Model
{


    public function getRouteKeyName()
    {
        return 'AppStat'; // db column name
    }
    
    public function documents() {
        return $this->hasMany('App\WizMobAppDocument', 'AppStatus', 'AppStat');
     }
}
