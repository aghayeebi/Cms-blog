<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            'name' => 'Electronica',
        ]);
        Categorie::create([
            'name' => 'Fashions',
        ]);
        Categorie::create([
            'name' => 'Sports',
        ]);
    }
}
