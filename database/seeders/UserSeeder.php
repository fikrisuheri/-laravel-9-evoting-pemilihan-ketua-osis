<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create Role
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'user']);
 
         // Create User
         $user = User::create([
             'name' => 'Admin',
             'email' => 'admin@mail.com',
             'password' => bcrypt('password')
         ]);
         $user->assignRole('admin');
    }
}
