<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTable([
            'users','clientes','personas','tipoidentificaciones','productos','formulas',
        ]);

        $this->call(TipoidentificacioneSeeder::class);
        \App\Models\Persona::factory(20)->create();
        \App\Models\User::factory(1)->create();
       \App\Models\Cliente::factory(5)->create();
       \App\Models\Producto::factory(20)->create();
       \App\Models\Formula::factory(5)->create();

    }

    protected function truncateTable(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
    }
}
