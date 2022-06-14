<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Collection;
use App\Models\Photo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Collection::truncate();
        Photo::truncate();

        User::factory()->count(2)->create();
        Collection::factory()->count(3)->create();
        Photo::factory()->count(4)->create();

    }
}