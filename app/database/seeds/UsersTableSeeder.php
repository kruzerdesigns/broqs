<?php

class UsersTableSeeder extends Seeder {

    public function run(){
        $user = new User;
        $user->firstname = 'Layinka';
        $user->lastname = 'Jaji';
        $user->email = 'layinkajaji@hotmail.com ';
        $user->password = Hash::make('password');
        $user->telephone = '07572616124';
        $user->save();
    }

}