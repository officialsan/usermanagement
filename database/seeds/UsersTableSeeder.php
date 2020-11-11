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
        $user = [
            [
               'username'=>'admin',
               'role'=>'1',
               'password'=> bcrypt('123456'),
            ],[
               'username'=>'manager',
               'role'=>'2',
               'password'=> bcrypt('123456'),
            ],
            [
               'username'=>'user',
               'role'=>'3',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
