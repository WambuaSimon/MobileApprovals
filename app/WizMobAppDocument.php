<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppDocument extends Model
{
    protected $fillable = [
        'DocType'
    ];
    public function getRouteKeyName()
{
    return 'DocType'; // db column name
}

    public function workflow() {
        return $this->hasMany('App\WizMobAppWorkFlow', 'DocType','DocType');
     }

     public function appStatus() {
        return $this->belongsTo('App\WizMobAppStatus', 'AppStatus','AppStat');
     }

}
