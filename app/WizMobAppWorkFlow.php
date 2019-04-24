<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppWorkFlow extends Model
{
    protected $fillable = [
        'DocType', 'SequenceID','GroupID','AgentID', 'IsApproved'
    ];
   protected $casts = [
       'SequenceID' => 'array'
   ]; 


}
