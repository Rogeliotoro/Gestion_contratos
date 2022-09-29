<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code',
        'Name',
    ];
    
    public function post()
    {
        return $this->hasMany(Post::class, 'files_id', 'id');
    }
}
