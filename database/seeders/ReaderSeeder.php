<?php

namespace Database\Seeders;

use App\Models\reader;
use Illuminate\Database\Seeder;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (reader::count() == 0) {
            reader::factory(20)->create();
        }
    }
}
