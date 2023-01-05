<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;
        $u->name = "Tester Test";
        $u->email = "testing@test.com";
        $u->password = "password";
        $u->role_id = "1";

        $u->save();
        
        User::factory()->count(5)->has(Post::factory()->count(3))->create();

    }
}
