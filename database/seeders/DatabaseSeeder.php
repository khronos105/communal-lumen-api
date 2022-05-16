<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Comunal;
use App\Models\Doc;
use App\Models\Invoice;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunal::factory()->has(
            Invoice::factory()->has(
                Doc::factory()
            )->count(3)
        )->count(10)->create();
    }
}
