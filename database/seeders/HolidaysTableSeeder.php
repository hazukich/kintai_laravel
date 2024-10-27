<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追記
use Carbon\Carbon; //追記

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //元旦
        $param = [
            'yyyymmdd' => '20240101',
            'holiday_name' => '元旦',
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('holidays')->insert($param);

        //成人の日
        $param = [
            'yyyymmdd' => '20240108',
            'holiday_name' => '成人の日',
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('holidays')->insert($param);

        //建国記念の日
        $param = [
            'yyyymmdd' => '20240211',
            'holiday_name' => '建国記念の日',
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('holidays')->insert($param);

        //天皇誕生日
        $param = [
            'yyyymmdd' => '20240223',
            'holiday_name' => '天皇誕生日',
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('holidays')->insert($param);


    }
}
