<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sites')->insert([
            [
                'name' => "Rahi's Blog",
                'url' => 'rahisblog.com'
            ],
            [
                'name' => "Nick's Blog",
                'url' => 'nicksblog.com'
            ],
        ]);
    }
}
