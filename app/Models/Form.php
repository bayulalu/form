<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title', 'subject','slug', 'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function responses()
    {
        return $this->hasMany('App\Models\FormResponse');
    }

    public function notifs()
    {
        return $this->hasMany('App\Models\Notif');
    }

}
