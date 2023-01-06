<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Image;

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
        $roles = Role::all();

        // $user->image_id = $i->id;
        $u = new User;
        $u->name = "Tester Test";
        $u->email = "testing@test.com";
        $u->password = bcrypt("password");
        $u->save();
        $u->roles()->attach(2); 
        $i = new Image;
        $i->url = "users/1.jpg";
        $u->image()->save($i);

        $u = new User;
        $u->name = "Admin 1";
        $u->email = "admin@test.com";
        $u->password = bcrypt("password");
        $u->save();
        $u->roles()->attach(1); 
        $i = new Image;
        $i->url = "users/2.png";
        $u->image()->save($i);

        $u = new User;
        $u->name = "Moderator 1";
        $u->email = "mod@test.com";
        $u->password = bcrypt("password");
        $u->save();
        
        $u->roles()->attach(3); 
        $i = new Image;
        $i->url = "users/3.png";
        $u->image()->save($i);

        User::factory()->count(5)->has(Post::factory()->count(3))->hasAttached(Role::all()->get(1))->create();

    }
}
