<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre'=>'Luces']);
        Categoria::create(['nombre'=>'Frenos']);
        Categoria::create(['nombre'=>'Bocinas']);
        Categoria::create(['nombre'=>'Canastas']);
        Categoria::create(['nombre'=>'Asientos']);
    }
}
