<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role;
        $admin->name = "admin";
        $admin->edit_all_users = "1";
        $admin->delete_all_users = "1";

        $admin->edit_all_posts = "1";
        $admin->delete_all_posts = "1";

        $admin->edit_all_comments = "1";
        $admin->delete_all_comments = "1";

        $admin->save();

        $default = new Role;
        $default->name = "default";
        $default->edit_all_users = "0";
        $default->delete_all_users = "0";

        $default->edit_all_posts = "0";
        $default->delete_all_posts = "0";

        $default->edit_all_comments = "0";
        $default->delete_all_comments = "0";

        $default->save();

        $mod = new Role;
        $mod->name = "mod";
        $mod->edit_all_users = "0";
        $mod->delete_all_users = "1";

        $mod->edit_all_posts = "0";
        $mod->delete_all_posts = "1";

        $mod->edit_all_comments = "0";
        $mod->delete_all_comments = "1";

        $mod->save();
    }
}
