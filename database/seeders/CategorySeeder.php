<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategorySeeder extends Seeder
{
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;

        $data = [
            [
                'name' => 'Web',
                'created_by' => $id,
            ],
            [
                'name' => 'Branding',
                'created_by' => $id,
            ],
            [
                'name' => 'Design',
                'created_by' => $id,
            ],
            [
                'name' => 'Logo',
                'created_by' => $id,
            ]
        ];

        foreach ($data as $category) {
            // dd($category['name']);
            DB::table('categories')->insert([
                'name' => $category['name'],
                'created_by' => $category['created_by']
            ]);
        };
    }
}
