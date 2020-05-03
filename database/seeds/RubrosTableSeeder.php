<?php

use Illuminate\Database\Seeder;

class RubrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rubro::create(['name' => 'Descartables'
        , 'slug' => str_slug('Descartables'
        )]);App\Rubro::create(['name' => 'Reposteria'
        , 'slug' => str_slug('Reposteria'
        )]);App\Rubro::create(['name' => 'Cotillon'
        , 'slug' => str_slug('Cotillon'
        )]);App\Rubro::create(['name' => 'Heladeria'
        , 'slug' => str_slug('Heladeria'
        )]);App\Rubro::create(['name' => 'Golosinas'
        , 'slug' => str_slug('Golosinas'
        )]);App\Rubro::create(['name' => 'Libreria'
        , 'slug' => str_slug('Libreria'
        )]);
    }
}
