<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::insert('email','gabo1102@gmail.com')->first();

        if(empty($user)){
            User::insert([
                'name'=>'Gabriel',
                'email'=>'gabo1102@gmail.com',
                'password'=> Hash::make('525252cot',)
            ]);
        }
       // $user->assignRole('admin');

        $user= User::insert('email','jose23@gmail.com')->first();

        if(empty($user)){
            User::insert([
                'name'=>'Jose',
                'email'=>'jose23@gmail.com',
                'password'=> Hash::make('12345cot',)
            ]);
        }
        //$user->assignRole('user-est');

    }
}
