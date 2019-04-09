<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppDocument extends Model
{
    public function workflow() {
        return $this->hasMany('App\WizMobAppWorkFlow', 'DocType','DocType');
     }
}
