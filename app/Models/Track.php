<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'artist',
        'image',
        'music',
        'display',
        'play_count'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function tracks() : BelongsToMany
    {
        return $this->belongsToMany(Playlist::class)->withTimestamps();
    }
}
