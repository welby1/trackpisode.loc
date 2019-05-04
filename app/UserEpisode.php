<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEpisode extends Model
{
    protected $table = 'UsersEpisodes'; //связка с таблицей
    public $timestamps = false;
    protected $fillable=['User_id','Episode_id'];
}
