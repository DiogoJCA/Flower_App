<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    // Tell Laravel i'm not using the timestamp
    // public $timestamps = false;

    // Inner join:
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getUpdateAtAttribute($updated_at)
    {
        //return "{$this->title} / {$this->date_of_release}";
        return date("j F Y", $updated_at);  
    }
}
