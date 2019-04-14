<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'Seasons'; //связка с таблицей
    public $timestamps = false;
}
