<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'estado',
        'objeto',
        'condiciones',
        'observaciones',
        'societies_id',
        'cod_files',
        'cod_cecos',
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
    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function society()
    {
    
        return $this->hasOne(Society::class, 'id' , 'societies_id');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
