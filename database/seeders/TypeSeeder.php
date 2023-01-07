<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (type::count() == 0) {
            type::factory(10)->create();
        }
    }
}
