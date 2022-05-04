<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosPrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //personas
        DB::table('personas')->insert([
           
           'ci'=>'62132548',
           'nombre'=> 'Persona Admin 1',
           'edad'=> '18',
           'sexo'=>'M',
           'direccion' =>'AV. santigo silez',
           'telefono' =>'789431321',
           'tipo'=>'S',
        ]);
        DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 2',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'A',
         ]);
         DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 3',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'A',
         ]);
         DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 4',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'J',
         ]);
         DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 5',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'J',
         ]);
         DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 6',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'I',
         ]);
         DB::table('personas')->insert([
            
            'ci'=>'62132548',
            'nombre'=> 'Persona 7',
            'edad'=> '18',
            'sexo'=>'M',
            'direccion' =>'AV. santigo silez',
            'telefono' =>'789431321',
            'tipo'=>'I',
         ]);
        //abogados
        DB::table('abogados')->insert([
        
            'direccion_trabajo'=> 'Av san diego',
            'telefono_trabajo'=> '63235745',
            'persona_id'=> '2',
        ]);
        DB::table('abogados')->insert([
        
            'direccion_trabajo'=> 'Av san diego',
            'telefono_trabajo'=> '63235745',
            'persona_id'=> '3',
        ]);
        //juzgado
        DB::table('juzgados')->insert([
    
            'juzgado'=>'juzgado 1',
            'nro_interno'=>'1355',
            'ubicacion'=>'Av santos ramirez'
        ]);
        DB::table('juzgados')->insert([
    
            'juzgado'=>'juzgado 2',
            'nro_interno'=>'1355',
            'ubicacion'=>'Av santos ramirez'
        ]);
        //jueces
        DB::table('juezs')->insert([
            
            'persona_id'=>'4',
            'juzgado_id'=>'1',
        ]);
        DB::table('juezs')->insert([
            
            'persona_id'=>'5',
            'juzgado_id'=>'2',
        ]);
        //
        DB::table('users')->insert([
            
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'persona_id' => '1',
        ]);
        
    }
}
