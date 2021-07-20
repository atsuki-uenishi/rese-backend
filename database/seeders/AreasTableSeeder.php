<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '東京'
        ];
        $area = new Area;
        $area->fill($param)->save();

        $param = [
            'name' => '大阪'
        ];
        $area = new Area;
        $area->fill($param)->save();

        $param = [
            'name' => '福岡'
        ];
        $area = new Area;
        $area->fill($param)->save();
    }
}
