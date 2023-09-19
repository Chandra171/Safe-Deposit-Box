<?php

namespace Database\Seeders;

use App\Models\SDB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SDB::factory()->count(50)->create();
    }
}
