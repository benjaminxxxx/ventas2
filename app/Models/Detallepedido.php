<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pedido_id',
        'menu_id',
        'menu_titulo',
        'menu_precio',
        'menu_cantidad',
        'menu_subtotal'
    ];

}
