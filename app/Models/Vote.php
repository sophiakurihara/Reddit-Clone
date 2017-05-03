<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends BaseModel
{
    //
    protected $table = 'votes';

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function posts ()
    {
        return $this->hasMany('App\Models\Post', 'post_id');
    }
}
