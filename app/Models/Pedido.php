<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'mesa',
        'subtotal',
        'estado',
        'fecha_pago',
        'usuario_modifico',
        'usuario_cancelo',
        'usuario_proceso',
        'usuario_modifico_id',
        'usuario_cancelo_id',
        'usuario_proceso_id',
    ];

    public function detallepedido(){
        return $this->hasMany(Detallepedido::class);
    }

}
