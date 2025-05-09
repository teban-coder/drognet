<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	public $timestamps = false;

	protected $dates = [
		'fecha',
	];

	protected $fillable = [
	   'id','user_id','tipopago_id', 'fecha', 'referencia', 'envio', 'subtotal', 'tipo'
	];

	public function pedidoItems()
	{
		return $this->hasMany(PedidoItem::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function scopefecha($query, $fecha)
    {
        if($fecha)
            return $query->where('fecha', 'LIKE', "%$fecha%");
        
    }
}
