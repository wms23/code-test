<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);

        for ($i = 0; $i < 20; $i++) {
            DB::table('clients')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->ean8,
                'address' => $faker->address,
                'photo' => $faker->image('storage/app/public',640,480, null, false)
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            $clients = Client::pluck('id')->toArray();
            DB::table('billings')->insert([
                'amount' => $faker->numberBetween(10, 50),
                'due_date' => $faker->date('Y-m-d'),
                'client_id' => $faker->randomElement($clients),
                'description' => $faker->text(1000),
            ]);
        }
    }
}
