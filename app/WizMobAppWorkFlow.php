<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppWorkFlow extends Model
{
    protected $fillable = [
        'DocType', 'SequenceID', 'GroupID', 'AgentID', 'IsApproved',
    ];
    protected $casts = [
        'SequenceID' => 'array'
    ];

    public function document()
    {
        return $this->hasOne('App\WizMobAppDocument', 'DocType', 'DocType');
    }
    public function group()
    {
        return $this->belongsTo('App\WizMobAppGroup', 'GroupID', 'GroupID');
    }

}
