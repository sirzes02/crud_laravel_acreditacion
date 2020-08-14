<?php

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersSeeder::class);
        $this->call(RoleSeeder::class);

        $user = User::find(1);
        $role = Role::firstOrCreate(["name" => "administrador"]);
        $user->asignarRol($role);

        Model::reguard();
    }
}
