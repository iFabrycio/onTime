<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id';

    // public function user()
    // {
    //     return $this->belongsTo('App\Users', 'user_id');
    // }
}
