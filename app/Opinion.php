<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
	protected $fillable = [
	   'id','tema', 'mensaje', 'created_at'
	];

    protected static $temas = ['Sugerencia', 'Queja', 'Otro'];

	public static function temas($index = null)
	{
		return self::$temas;
	}

//Query Scope

public function scopeTema($query, $tema)
{
	if($tema)
		return $query->where('tema', 'LIKE', "%$tema%");
	
	}

public function scopeMensaje ($query, $mensaje)
{
	if($mensaje)
		return $query->where('mensaje', 'LIKE', "%$mensaje%");
	
	}
}
