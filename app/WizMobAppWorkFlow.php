<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WizMobAppWorkFlow extends Model




{

    protected $primaryKey = 'DocType';


    protected $fillable = [
        'DocType', 'SequenceID', 'AgentID', 'LastGroup','LastAgent','NextGroup','ApprovalStatus'
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
