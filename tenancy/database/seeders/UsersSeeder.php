<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

            //
            User::create([
            'name'=>'michael mamani',
            'email'=>'michael@gmail.com',
            'password'=>bcrypt('michael1234')
            ])->assignRole('admin');

    }
}
