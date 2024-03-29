<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_user = Role::where('name', 'user')->first();
        $role_loader = Role::where('name', 'loader')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Loader';
        $user->email = 'loader@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_loader);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'John Cena';
        $user->email = 'jcena@pescena.ce';
        $user->password = bcrypt('sabrocena');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Whoami';
        $user->email = 'who@ami.now';
        $user->password = bcrypt('I forgor');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Gawr Gura';
        $user->email = 'ggura@fake.com';
        $user->password = bcrypt('asdfghjklñ');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
