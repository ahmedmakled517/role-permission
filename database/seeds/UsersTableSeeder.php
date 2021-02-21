<?php

use Illuminate\Database\Seeder;

use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            "name"=>"super admin",
            "email"=>'a@a.com',
            "group"=>"1",
            "password"=>bcrypt('123456'),
        ]);
        $user->attachRole('super_admin');
    }
}
