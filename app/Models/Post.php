<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    static $rules = [
		'user_id',
        'estado',
        'objeto',
        'condiciones',
        'observaciones',
        'societies_id',
        'files_id',
        'cecos_id',
        'cod_cliente',
        'tipo',
        'firmante',
        'documentacion',
        'representacion',
        'importe',
        'forma_de_pago',
        'observaciones_adicionales',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['societies_id','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function society()
    {
    
        return $this->hasOne(Society::class, 'id' , 'societies_id');
    }
    

}
