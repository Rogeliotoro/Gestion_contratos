<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
    ];

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }

   
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
