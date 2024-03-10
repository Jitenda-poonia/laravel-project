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
        
        $data = [
        "name" => "jp",
        "email"=> "jitendra@gmail.com",
        "password"=> Hash::make(123),
        // "password"=> bcrypt("password"),
       
       ];
        $user = User::create($data);
        
    }
}
