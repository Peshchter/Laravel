<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getFakeNews(100));
    }

    /**
     * @param int $count
     * @return array
     */
    private function getFakeNews(int $count )
    {
        $faker = Faker\Factory::create('ru_RU');
        $data =  [];
        $number = function (string $text) {
            return mb_strlen($text) > 5;
        };
        for ($i =0; $i < $count; $i++){
            $data[] = [
                'title' => $faker->valid($number)->realText(rand(10,20)),
                'text' => $faker->realText(rand(1000,2000)),
                'category_id' => $faker->numberBetween(1,5)
            ];
        }
        return $data;
    }
}
