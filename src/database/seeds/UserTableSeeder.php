<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::create([
                	"firstname" => $faker->firstName(),
                	"lastname" => $faker->lastName(),
        	        'email' => 'admin@mailinator.com',
        	        'contact_number' => $faker->randomNumber(5).$faker->randomNumber(5),
                    'password' => 'admin@123',
                    'is_active' => true
                ]);
        $user->assignRole('admin');
    }
}
