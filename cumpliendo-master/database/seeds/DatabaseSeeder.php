<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
         // Crea en la tabla tipo_calificaciones la calificacion total
         $this->call(PuntajeTotal::class);
          // Crea en la tabla estados 
          $this->call(estados::class);
          // Crea en la tabla Jornadas 
          $this->call(Jornadas::class);
    }
}
