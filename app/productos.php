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
        'stock',
        'Precio',
        'Lote',
        'FechaVencimiento'

    ];

    public function scopelaboratorio($query, $Laboratorio)
    {
        if($Laboratorio)
            return $query->where('productos.Laboratorio', 'LIKE', "%$Laboratorio%");
        
    }
    public function scopeNombre($query, $Nombre)
    {
        if($Nombre)
            return $query->where('productos.Nombre', 'LIKE', "%$Nombre%");
        
    }

    public function scopeTip($query, $tip)
    {
	if($tip)
		return $query->where('tipomedicamentos.nombre', 'LIKE', "%$tip%");
	
    }
    /*public function pedidoItems()
    {
        return $this->hasMany(PedidoItem::class, 'producto_id', 'IdProducto');
    }*/
}
