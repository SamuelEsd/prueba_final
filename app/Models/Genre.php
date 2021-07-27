<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Relación muchos a muchos
    public function users(){
        return $this->belongsToMany(User::class);
    }

    // Relación muchos a muchos
    public function dics(){
        return $this->belongsToMany(Disc::class);
    }
}
