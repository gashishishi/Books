<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期パスワードは「 password 」
        $param =[
            'name' => '山田太郎',
            'email' => 'abx@aa.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '山田花子',
            'email' => 'ffs@ss.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '山田一郎',
            'email' => 'gadfg@aa.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        $param =[
            'name' => '高橋太一',
            'email' => 'aggaagasgd@sssss.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '飯田いい子',
            'email' => 'gas@gadgas.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '山下一夫',
            'email' => 'gasgasgas@hs.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '小林健二',
            'email' => 'hsdae@xzrya.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '山田太郎',
            'email' => 'aerhh@jwsrf.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '田中山田中',
            'email' => 'aa@asssssa.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '鈴木大助',
            'email' => 'agag@aagaga.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

        $param =[
            'name' => '川辺かおり',
            'email' => 'krtyeej@wey.jp',
            'password' => '$2y$10$nnKxafNXSR/EmSwLn.BcQeMLDNokC9iRJ40ZvDnn8OfCGgb0SlLfS',
            'number_of_rentals' => 0,
        ];
        DB::table('users')->insert($param);

    }
}
