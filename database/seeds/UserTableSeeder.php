<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->insert(array (
            'name'  => 'Administrator',
            'email'      => 'walter.rosales@gmail.com',
            'password'   =>  Hash::make('meli$1116')
        ));
    }

}