<?php

use Illuminate\Database\Seeder;

class StockproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Stockproduct::class, 2000)->create();
    }
}
