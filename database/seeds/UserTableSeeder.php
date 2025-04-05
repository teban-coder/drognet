<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
        [  
         'name' => 'Esteban',
         'rol' => 'admin',
         'apellido' => 'Martinez',
         'documento' => '1002395029',
         'celular' =>'3172248906', 
         'email' => 'esteban.martinez2011@hotmail.com',
         'password' => \Hash::make('123456'),
         'Direccion' => 'Manzana B casa#10',
         'created_at' => new DateTime,
         'updated_at' => new DateTime
        ],
        [
            'name' => 'Sofia',
            'rol' => 'vendedor',
            'apellido' => 'Martinez',
            'documento' => '1002395029',
            'celular' =>'3172248906', 
            'email' => 'sofia.sanalf@gmail.com',
            'password' => \Hash::make('123456'),
            'Direccion' => 'Manzana B casa#10',
            'created_at' => new DateTime,
            'updated_at' => new DateTime 
        ],
        [
            'name' => 'Brayan',
            'rol' => 'admin',
            'apellido' => 'Martinez',
            'documento' => '1002395029',
            'celular' =>'3172248906', 
            'email' => 'molisanta21@gmail.com',
            'password' => \Hash::make('123456'),
            'Direccion' => 'Manzana B casa#10',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ],

        );
        User::insert($data);
    }
}
