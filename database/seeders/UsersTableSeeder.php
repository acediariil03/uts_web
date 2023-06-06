<?php 

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        /*
        user ::create([
            'name' => 'Angelina Patience',
            'email' => 'angelina.mulia@binus.ac.id',
            'password' => Hash::make('759897')
        ]);
        */

        $faker = faker::create('id_ID');

        for($i=1; $i <= 10; $i++)
        {
            User::create([
                'name' => $faker->address,
                'email' => $faker->email,
                'password' => '',
            ]);
        }
    }
}