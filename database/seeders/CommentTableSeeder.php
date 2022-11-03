<?php

namespace Database\Seeders;

use App\Models\Comment;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->user_id = "2";
        $c->post_id = "1";
        $c->content = "Wow nice dog";
        $c->save();
        
        Comment::factory()->count(20)->create();
    }
}
