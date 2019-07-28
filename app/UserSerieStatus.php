<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSerieStatus extends Model
{
    protected $table = 'UserSerieStatus'; //связка с таблицей
    public $timestamps = false;
    protected $fillable=['User_id','Serie_id','status'];
}
