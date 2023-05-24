<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoidentificacioneSeeder extends Seeder
{
    public function run()
    {
        $descripcion[1]= 'tarjeta de identidad';

        $descripcion[2]= 'cédula de ciudadanía';
        
        $descripcion[3]= 'tarjeta de extranjería';

        $descripcion[4]= 'cédula de extranjería';

        $descripcion[5]= 'NIT';

        $descripcion[6]= 'pasaporte';

        $descripcion[7]= 'tipo de documento extranjero';

        $descripcion[8]= 'sin identificación del exterior u uso definido por la DIAN';


        for ($i=1;$i<=8; $i++){
        
            DB::table('tipoidentificaciones')->insert([
            'id' => $i,
            'descripcion'=> $descripcion[$i],
          ]);
        }


        $descripcion[1]= 'Factura de venta por computador'; 
        $descripcion[2]= 'Factura electrónica de venta'; 
        $descripcion[3]= 'Cuenta de cobro'; 

        for ($i=1;$i<=3; $i++){
        
            DB::table('tipo_facturaciones')->insert([
            'id' => $i,
            'descripcion'=> $descripcion[$i],
          ]);
        }
    }
}
