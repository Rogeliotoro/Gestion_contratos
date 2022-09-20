<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSociedad',
        'name',
        'displayName',
        'systemVersion',
        'systemCreatedBy',
        'systemModifiedBy',
        'systemCreatedAt',
        'systemModifiedAt'
    ];

  
    public function post()
    {
        return $this->belongsTo(Society::class);
    }
    

}
