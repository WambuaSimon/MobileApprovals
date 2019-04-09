<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppStatus extends Model
{

    protected $primaryKey = 'AppStat';

    public function documents() {
        return $this->hasMany('App\WizMobAppDocument', 'AppStatus', 'AppStat');
     }
}
