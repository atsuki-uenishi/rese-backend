<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '寿司'
        ];
        $area = new Genre;
        $area->fill($param)->save();

        $param = [
            'name' => '焼肉'
        ];
        $area = new Genre;
        $area->fill($param)->save();
        $param = [
            'name' => '居酒屋'
        ];
        $area = new Genre;
        $area->fill($param)->save();

        $param = [
            'name' => 'イタリアン'
        ];
        $area = new Genre;
        $area->fill($param)->save();

        $param = [
            'name' => 'ラーメン'
        ];
        $area = new Genre;
        $area->fill($param)->save();
    }
}
