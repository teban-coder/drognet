<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;

	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	   'id','name','apellido','documento','celular', 'email', 'password','Direccion', 'rol'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	protected $primaryKey ='id';

	
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CambiarPassword($token));
    // }

	protected $roles = ['cliente', 'admin', 'vendedor'];

	public function roles($index = null)
	{
		return $this->roles;
	}
}
