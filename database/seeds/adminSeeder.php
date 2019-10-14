<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
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
	$user->email = 'admin@mail.com';
	$user->password = Hash::make('admin');
	$user->save();
    }
}
