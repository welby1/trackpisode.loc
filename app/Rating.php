<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'Ratings'; //связка с таблицей
    protected $fillable=['Serie_id','User_id','vote'];
    public $timestamps = false;
}
