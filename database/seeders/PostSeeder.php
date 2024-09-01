<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'website_id' => 1,
                'title' => 'The Future of Tech: 2025 and Beyond',
                'description' => 'Exploring the upcoming trends and advancements in technology over the next few years.',
            ],
            [
                'website_id' => 1,
                'title' => 'AI in Everyday Life',
                'description' => 'How artificial intelligence is being integrated into daily routines and its impacts.',
            ],
            [
                'website_id' => 2,
                'title' => 'Top 10 Health Tips for 2024',
                'description' => 'Essential health tips to stay fit and healthy in the coming year.',
            ],
            [
                'website_id' => 2,
                'title' => 'Understanding Mental Health',
                'description' => 'A comprehensive guide to mental health awareness and practices.',
            ],
            [
                'website_id' => 3,
                'title' => 'Best Travel Destinations for 2024',
                'description' => 'A list of top travel destinations to visit in the upcoming year.',
            ],
            [
                'website_id' => 3,
                'title' => 'Traveling on a Budget',
                'description' => 'Tips and tricks for traveling without breaking the bank.',
            ],
        ];

        DB::table('posts')->insert($posts);

    }
}
