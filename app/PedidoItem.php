<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
	public $timestamps = false;

	protected $fillable = [
	   'id','pedido_id', 'producto_id', 'cantidad', 'precio'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class);
	}

	/*public function productos()
	{
		return $this->belongsTo(Productos::class, 'IdProducto');
	}*/
}
