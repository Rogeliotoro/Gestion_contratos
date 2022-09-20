<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'comentarios',
        'estado',
        'objeto',
        'condiciones',
        'observaciones',
        'importe',
        'forma_de_pago',
        'observaciones_adicionales',
        'tipo',
        'firmante',
        'documentacion',
        'representacion',
        'societies_id',
        'files_id',
        'fecha_inicio',
        'fecha_fin',
        'cecos_id',
        'users_id'
    ];

    public function society()
    {
        return $this->belongsTo(Society::class, 'societies_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'files_id');
    }

    protected $table = 'solicitudes';
}
