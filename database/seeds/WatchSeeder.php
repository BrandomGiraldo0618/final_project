<?php

use App\Watch;
use Illuminate\Database\Seeder;

class WatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Watch::class, 10)->create();
    }
}
