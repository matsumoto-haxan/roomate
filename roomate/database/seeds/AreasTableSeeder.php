<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
            Area::create(
              [
                'area_cd' => '1',
                'pref_cd' => '1',
                'prefname' => '東京都',
                'cityname' => '中央区',
              ]);
            Area::create(
              [
                'area_cd' => '2',
                'pref_cd' => '1',
                'prefname' => '東京都',
                'cityname' => '港区',
              ]);
            Area::create(
              [
                'area_cd' => '3',
                'pref_cd' => '1',
                'prefname' => '東京都',
                'cityname' => '千代田区',
              ]);
            Area::create(
              [
                'area_cd' => '4',
                'pref_cd' => '2',
                'prefname' => '神奈川県',
                'cityname' => '横浜市',
              ]);
            Area::create(
              [
                'area_cd' => '5',
                'pref_cd' => '2',
                'prefname' => '神奈川県',
                'cityname' => '川崎市',
              ]);
            Area::create(
              [
                'area_cd' => '6',
                'pref_cd' => '3',
                'prefname' => '埼玉県',
                'cityname' => '川口市',
              ]
            );
    }
}
