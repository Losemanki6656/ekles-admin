<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Document;
use App\Models\Law;
use App\Models\Leader;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::query()
            ->create([
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'name' => 'Admin'
            ]);


        Category::query()->create([
            'name' => [
                'en' => 'Afrosiyob',
                'uz' => 'Afrosiyob',
                'ru' => 'Afrosiyob'
            ]
        ]);

        Category::query()->create([
            'name' => [
                'en' => 'Corruption',
                'uz' => 'Korrupsiya',
                'ru' => 'Коррупция'
            ]
        ]);

        Category::query()->create([
            'name' => [
                'en' => 'Market Economy',
                'uz' => 'Bozor iqtisidiyoti',
                'ru' => 'Рыночная экономика'
            ]
        ]);

        Category::query()->create([
            'name' => [
                'en' => 'Conference',
                'uz' => 'Anjuman',
                'ru' => 'Конференция'
            ]
        ]);

        Category::query()->create([
            'name' => [
                'en' => 'Construction',
                'uz' => 'Qurilish',
                'ru' => 'Строительство'
            ]
        ]);

        News::query()->create([
            'category_id' => 2,
            'title' => [
                'en' => 'China - Kyrgyzstan - Uzbekistan',
                'uz' => 'Xitoy - Qirg‘iziston - O‘zbekiston',
                'ru' => 'Китай - Кыргызстан - Узбекистан'
            ],
            'description' => [
                'en' => 'China - Kyrgyzstan - Uzbekistan',
                'uz' => 'Xitoy - Qirg‘iziston - O‘zbekiston',
                'ru' => 'Китай - Кыргызстан - Узбекистан'
            ],
            'cre' => '2025-01-20',
            'published' => true
        ]);

        NewsImage::query()->insert([
            [
                'news_id' => 1,
                'image' => 'uploads/images/123132456497654563413214.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        Law::query()->create([
            'title' => [
                'en' => 'Decision No. 537',
                'ru' => 'Постановление №537',
                'uz' => '537-son qaror',
            ],
            'description' => [
                'en' => 'Resolution No. 537 of the Cabinet of Ministers of the Republic of Uzbekistan dated 28.09.2022',
                'ru' => 'Постановление Кабинета Министров Республики Узбекистан от 28.09.2022 №537',
                'uz' => 'O‘zbekiston Respublikasi Vazirlar Mahkamasining 28.09.2022 yildagi 537-son qarori',
            ],
            'link' => 'https://lex.uz/ru/docs/6211101'
        ]);

        Law::query()->create([
            'title' => [
                'en' => 'Decision No. 502',
                'ru' => 'Постановление №502',
                'uz' => '502-son qaror',
            ],
            'description' => [
                'en' => 'Resolution No. 502 of the Cabinet of Ministers of the Republic of Uzbekistan dated 14.08.2024',
                'ru' => 'Постановление Кабинета Министров Республики Узбекистан от 14.08.2024 №502',
                'uz' => 'O‘zbekiston Respublikasi Vazirlar Mahkamasining 14.08.2024 yildagi 502-son qarori',
            ],
            'link' => 'https://lex.uz/docs/7080176'
        ]);

        Law::query()->create([
            'title' => [
                'en' => 'Decision No. 43',
                'ru' => 'Постановление №43',
                'uz' => '43-son qaror',
            ],
            'description' => [
                'en' => 'Resolution No. 43 of the Cabinet of Ministers of the Republic of Uzbekistan dated 30.01.2021',
                'ru' => 'Постановление Кабинета Министров Республики Узбекистан от 30.01.2021 №43',
                'uz' => 'O‘zbekiston Respublikasi Vazirlar Mahkamasining 30.01.2021 yildagi 43-son qarori',
            ],
            'link' => 'https://lex.uz/docs/5249376'
        ]);

        Law::query()->create([
            'title' => [
                'en' => 'Decision No. 318',
                'ru' => 'Постановление №318',
                'uz' => '318-son qaror',
            ],
            'description' => [
                'en' => 'Resolution No. 318 of the Cabinet of Ministers of the Republic of Uzbekistan dated 06.07.2004',
                'ru' => 'Постановление Кабинета Министров Республики Узбекистан от 06.07.2004 №318',
                'uz' => 'O‘zbekiston Respublikasi Vazirlar Mahkamasining 06.07.2004 yildagi 318-son qarori',
            ],
            'link' => 'https://lex.uz/docs/337769'
        ]);

        Law::query()->create([
            'title' => [
                'en' => 'Law No. 820',
                'ru' => 'Закон №820',
                'uz' => '820-son qonun',
            ],
            'description' => [
                'en' => 'Law No. 820 of the Republic of Uzbekistan dated 27.02.2023',
                'ru' => 'Закон Республики Узбекистан от 27.02.2023 №820',
                'uz' => 'O‘zbekiston Respublikasining 27.02.2023 yildagi O‘RQ-820-son Qonuni',
            ],
            'link' => 'https://lex.uz/docs/6392305'
        ]);

        Document::query()->create([
            'title' => [
                'en' => 'ACCREDITATION CERTIFICATE OS',
                'ru' => 'СВИДЕТЕЛЬСТВО ОБ АККРЕДИТАЦИИ ОС',
                'uz' => 'AKKREDITATSIYA guvohnomasi OS',
            ],
            'description' => [
                'en' => 'ACCREDITATION CERTIFICATE OS',
                'ru' => 'СВИДЕТЕЛЬСТВО ОБ АККРЕДИТАЦИИ',
                'uz' => 'AKKREDITATSIYA TO‘G‘RISIDA GUVOHNOMA',
            ],
            'file' => 'uploads/files/1.pdf'
        ]);

        Document::query()->create([
            'title' => [
                'en' => 'CERTIFICATE area',
                'ru' => 'Область Свидетельство',
                'uz' => 'Guvohnoma ilovasi',
            ],
            'description' => [
                'en' => 'ACCREDITATION CERTIFICATE AIL',
                'ru' => 'СВИДЕТЕЛЬСТВО ОБ АККРЕДИТАЦИИ ОС АИЛ',
                'uz' => 'AKKREDITATSIYA guvohnomasi AIL',
            ],
            'file' => 'uploads/files/2.pdf'
        ]);

        Leader::query()->create([
            'name' => [
                'en' => 'Madjidov Farxod Sapiyevich',
                'ru' => 'Madjidov Farxod Sapiyevich',
                'uz' => 'Madjidov Farxod Sapiyevich',
            ],
            'position' => [
                'en' => 'Director',
                'ru' => 'Директор',
                'uz' => 'Direktor',
            ],
            'image' => 'uploads/leaders/1.jpg'
        ]);

        Leader::query()->create([
            'name' => [
                'en' => 'Rasulev Diyor Xolmatovich',
                'ru' => 'Rasulev Diyor Xolmatovich',
                'uz' => 'Rasulev Diyor Xolmatovich',
            ],
            'position' => [
                'en' => 'Director of the Authority',
                'ru' => 'Директор Органа',
                'uz' => 'Organ Direktori',
            ],
            'image' => 'uploads/leaders/2.jpg'
        ]);

        Leader::query()->create([
            'name' => [
                'en' => 'Eshonkulov Sunnat Farxodovich',
                'ru' => 'Eshonkulov Sunnat Farxodovich',
                'uz' => 'Eshonkulov Sunnat Farxodovich',
            ],
            'position' => [
                'en' => 'Head of the laboratory',
                'ru' => 'Начальник лаборатории',
                'uz' => "Laboratoriya bo'limi boshlig'i",
            ],
            'image' => 'uploads/leaders/3.jpg'
        ]);

        Photo::query()->create(['photo' => 'uploads/photos/6.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/7.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/8.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/9.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/10.jpg']);

        Photo::query()->create(['photo' => 'uploads/photos/1.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/3.jpg']);
        Photo::query()->create(['photo' => 'uploads/photos/5.jpg']);
    }
}
