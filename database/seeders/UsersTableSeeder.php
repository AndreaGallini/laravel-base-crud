<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('users_login');
        // dd(compact('user'));
        foreach($users as $user){
                  $newUser = new User;
            $newUser->name = $user['name'];
            $newUser->email =$user['email'];
            $newUser->password = $user['password'];
            $newUser->save();
        }

    }
}
