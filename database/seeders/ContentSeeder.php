<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::factory()->createMany(30)->map(
            fn(Content $content) => $content->metas()->createMany([
                ['name' => 'description', 'value' => 'This is a description'],
                ['name' => 'keywords', 'value' => 'This, is, a, keyword'],
            ])
        );
    }
}
