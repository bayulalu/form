<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $fillable = [
        'subject','seen','form_id', 'user_id','hel'
   ];


   public function user()
   {
       return $this->belongsTo('App\Models\User');
   }

   public function form()
   {
       return $this->belongsTo('App\Models\Form');
   }
}
