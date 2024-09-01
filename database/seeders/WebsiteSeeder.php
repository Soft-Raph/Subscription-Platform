<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $websites = [
            [
                'name' => 'Tech Insights',
                'url' => 'https://techinsights.com',
            ],
            [
                'name' => 'Health Matters',
                'url' => 'https://healthmatters.com',
            ],
            [
                'name' => 'Travel Diary',
                'url' => 'https://traveldiaries.com',
            ],
        ];

        DB::table('websites')->insert($websites);
    }
}
