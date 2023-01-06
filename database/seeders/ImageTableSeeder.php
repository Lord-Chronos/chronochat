<?php

namespace Database\Seeders;
use App\Models\Image;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = new Image;
        $i->id = "1";
        $i->url = "users/non.jpg";
        $i->imageable_id = "1";
        $i->imageable_type = "user";

        $i->save();
    }
}
