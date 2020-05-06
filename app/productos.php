<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    //
    protected $table = "productos";
    protected $primaryKey = 'IdProducto';

    protected $fillable = [
        'IdProducto',
        'IdTipoMedicamento',
        'Nombre',
        'Imagen',
        'Laboratorio',
        'Precio',
        'Lote',
        'FechaVencimiento'

    ];

    /*public function pedidoItems()
    {
        return $this->hasMany(PedidoItem::class, 'producto_id', 'IdProducto');
    }*/
}
