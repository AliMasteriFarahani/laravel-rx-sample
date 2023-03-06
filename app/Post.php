<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // Post --> table = posts
    // postAdmin insteadOf Post: 
    // protected $table = 'posts';
    // protected $primaryKey = 'id';

    // use soft delete :
    // $table->softDeletes(); add in migration 
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $fillable = ['title', 'content'];



    //-----------------------------------------
    // Eloquent One to One : 
    //-----------------------------------------
    //-----------------------------------------
    // Eloquent One to Many : 
    //-----------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
