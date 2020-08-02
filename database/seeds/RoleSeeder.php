<?php

use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Role::create(["name" => "administrador"]);
    }
}
