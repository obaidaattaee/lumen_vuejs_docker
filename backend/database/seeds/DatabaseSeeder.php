<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // $this->call('UsersTableSeeder');
        User::create([
            'name' => 'admin' ,
            'email' => 'admin@admin.com',
            'password' => app('hash')->make('1234567890'),
        ]);
        User::create([
            'name' => 'obaida' ,
            'email' => 'obaida@obaida   .com',
            'password' => app('hash')->make('1234567890'),
        ]);
    }
}
