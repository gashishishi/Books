<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LendingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'book_id' => 2,
            'checkout_date' => '2023-02-10',
        ];
        DB::table('lendings')->insert($param);

        $param = [
            'user_id' => 3,
            'book_id' => 3,
            'checkout_date' => '2023-02-06',
        ];
        DB::table('lendings')->insert($param);
        $param = [
            'user_id' => 6,
            'book_id' => 1,
            'checkout_date' => '2023-02-07',
        ];
        DB::table('lendings')->insert($param);
        $param = [
            'user_id' => 7,
            'book_id' => 7,
            'checkout_date' => '2023-02-10',
        ];
        DB::table('lendings')->insert($param);
        $param = [
            'user_id' => 7,
            'book_id' => 6,
            'checkout_date' => '2023-02-08',
        ];
        DB::table('lendings')->insert($param);
    }
}
