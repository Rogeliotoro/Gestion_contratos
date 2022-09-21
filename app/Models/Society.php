<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    
    static $rules = [
        'idSociedad',
        'name',
        'displayName',
        'systemVersion',
        'systemCreatedBy',
        'systemModifiedBy',
        'systemCreatedAt',
        'systemModifiedAt'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'societies_id', 'id');
    }
    
}