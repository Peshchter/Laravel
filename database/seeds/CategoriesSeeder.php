<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getFakeCategories(5));
    }

    /**
     * @return array
     */
    private function getFakeCategories(int $count)
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        $number = function (string $text) {
            return mb_strlen($text) > 5;
        };
        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'title' => $faker->valid($number)->realText(rand(10, 20))
            ];
        }
        return $data;
    }
}
