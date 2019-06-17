<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'Comments'; //связка с таблицей
    protected $fillable=['User_id','Serie_id','body'];
}
