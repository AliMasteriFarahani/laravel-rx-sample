<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //-----------------------------------------
    // Eloquent Many to Many : 
    //-----------------------------------------

    public function users(){
        // return $this->belongsToMany(User::class);
        return $this->belongsToMany(User::class)->withPivot('created_at','updated_at');
    }
}
