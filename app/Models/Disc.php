<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'album',
        'artist',
        'year',
        'photo',
    ];

    public function scopeFilterByNameAlbumArtist($query,$filter){
        if (!empty($filter)) {
            $query->where('name', 'LIKE','%'.$filter.'%')
            ->orWhere('album', 'LIKE','%'.$filter.'%')
            ->orWhere('artist', 'LIKE','%'.$filter.'%')
            ->orderBy('name');    
        }
        
    }

    // Relación muchos a muchos
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    
}
