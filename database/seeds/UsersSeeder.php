<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create([
            "name" => "Santiago", "email" => "sirzes02@gmail.com", "password" => bcrypt("567294381")
        ]);
    }
}
