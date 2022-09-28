<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
       'vigencia',
       'user_id',
       'posts_id',
       'estado',
       'importancia',
       'urgencia',
       'tipologia',
       'observaciones',
       'comentarios',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}