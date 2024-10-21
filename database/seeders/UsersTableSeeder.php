<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \App\Models\User;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // ユーザーテーブルをクリア
        DB::table('users')->truncate();

        // ランダムなユーザーを10人作成
        User::factory(10)->create();
    }
}



