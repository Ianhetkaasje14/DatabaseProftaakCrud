<?php
//  dit bestand is eervoor om dummy data in de dattabase te zetten
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    // De seeder runt met php artisan db:seed --class=NewsSeeder of php artisan db:seed voor alle seeders
    public function run(): void
    {
        News::create([
            'title' => 'test 1 ofzo ',
            'content' => 'dit is een super leuk bericht'
        ]);

        News::create([
            'title' => 'test 22222222222222222222',
            'content' => 'als je dit leest werkt de seeeeeeedeeeeeeer'
        ]);

        News::create([
            'title' => 'kaas',
            'content' => 'kaaasje '
        ]);
    }
}
