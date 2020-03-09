<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin@mail.net',
            'password' => Hash::make('123'),
            'isAdmin' => true,
        ];
        DB::table('users')->insert($admin);
        DB::table('users')->insert($this->getFakeUsers(5));
    }

    /**
     * @param int $count
     * @return array
     */
    private function getFakeUsers(int $count )
    {
        $faker = Faker\Factory::create('ru_RU');
        for ($i =0; $i < $count; $i++){
            $data[] = [
                'name' => $faker->name(),
                'email' => $faker->email,
                'password' => Hash::make($faker->text(8)),

            ];
        }
        return $data;
    }
}
