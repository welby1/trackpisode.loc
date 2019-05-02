<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'Episodes'; //связка с таблицей
    public $timestamps = false;
}
