<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    protected $fillable = [
         'subject','form_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }

    public function notifs()
    {
        return $this->hasMany('App\Models\Notif');
    }

}
