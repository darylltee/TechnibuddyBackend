<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoolOptions extends Model
{
    protected $table = 'poolOptions';
    protected $fillable = ['title','pool_id','vote'];
}
