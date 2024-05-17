<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'Canned food',
            'Rice',
            'Pasta',
            'Cereals',
            'Cake',
            'Other',
            'Soft drink',
            'Alcohol'
        ];
        foreach ($datas as $data) {
            Categorie::create([
                'name' => $data
            ]);
        }
    }
}
