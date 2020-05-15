<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function  userfrom (){
    return $this->belongsTo('App\User','user_id_from');

}
 public function  userto (){
    return $this->belongsTo('App\User','user_id_to');

}

}
