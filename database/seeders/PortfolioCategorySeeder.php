<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PortfolioCategorySeeder extends Seeder
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

        foreach ($data as $country) {
            // dd($country['name']);
            DB::table('portfolio_categories')->insert([
                'name' => $country['name'],
                'created_by' => $country['created_by']
            ]);
        };
    }
}
