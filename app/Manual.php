<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Manual extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('\App\User', 'user_manual', 'user_id', 'manual_id');
    }

    public function permiso()
    {
        $link = \App\UserManual::where('manual_id', $this->id)->where('user_id', Auth::user()->id)->first();
        
        if (Auth::check() && $link->forbidden === 0) {
            return true;
        }
        return false;
    }
}
