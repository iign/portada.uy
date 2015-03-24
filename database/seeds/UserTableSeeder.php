<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('id' => 1 , 'email' => 'ignacio@ign.uy', 'password' => Hash::make('demo')));
    }

}
