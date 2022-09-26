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
    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function society()
    {
    
        return $this->hasOne(Society::class, 'id' , 'societies_id');
    }
    
    public function file()
    {
    
        return $this->hasOne(File::class, 'id' , 'files_id');
    }

    public function ceco()
    {
    
        return $this->hasOne(Ceco::class, 'id' , 'cecos_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }



}
