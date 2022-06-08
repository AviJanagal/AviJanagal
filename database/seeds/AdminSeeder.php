<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = 'admin';
        $user->email = 'bridge@gmail.com';
        $user->confirm_email = 'bridge@gmail.com';
        $user->password = \Hash::make('bridge@123');
        $user->confirm_password = \Hash::make('bridge@123');
        $user->first_name = 'bridge';
        $user->last_name = 'admin';
        $user->address = 'ropar';
        $user->city = 'ropar';
        $user->apartment = 'ropar';
        $user->state = 'punjab';
        $user->zip_code = '123456';
        $user->phone_number = '1234567890';
        $user->role_name = "admin";
        $user->save();
    }
}
