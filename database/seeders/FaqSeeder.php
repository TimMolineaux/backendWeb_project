<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = FaqCategory::where('name', 'Algemeen')->first();

        if (!$category) {
            $this->command->error('FaqCategory "Algemeen" niet gevonden. Draai eerst FaqCategorySeeder.');
            return;
        }

        Faq::create([
            'category_id' => $category->id,
            'question' => 'Wat is het doel van deze site?',
            'answer' => 'Deze site laat je toe om nieuws te lezen.'
        ]);
    }
}
