<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'phpの本',
            'isbn' => '1234567890123',
            'price' => 1200,
            'publish' => '2020-05-21',
            'author' => 'php太郎',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        
        $param = [
            'title' => 'phpの本2',
            'isbn' => '123412324523',
            'price' => 1200,
            'publish' => '2021-05-22',
            'author' => 'php太郎',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '鼻',
            'isbn' => '5437890123',
            'price' => 350,
            'publish' => '1980-06-21',
            'author' => '芥川龍之介',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '人間失格',
            'isbn' => '5680912',
            'price' => 120,
            'publish' => '1970-10-11',
            'author' => '太宰治',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '銀河鉄道の夜',
            'isbn' => '67890123',
            'price' => 400,
            'publish' => '1960-1-31',
            'author' => '宮沢賢治',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => 'laravelの本',
            'isbn' => '123456',
            'price' => 3000,
            'publish' => '2022-10-11',
            'author' => 'laravel花子',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => 'ONEPIECE',
            'isbn' => '90123',
            'price' => 420,
            'publish' => '1999-04-15',
            'author' => '尾田栄一郎',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => 'シャーマンキング',
            'isbn' => '783218675',
            'price' => 420,
            'publish' => '1999-07-03',
            'author' => '武井宏之',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '英語の本',
            'isbn' => '44467890123',
            'price' => 2300,
            'publish' => '2010-08-09',
            'author' => 'eigoUmao',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '算数ドリル',
            'isbn' => '123456123',
            'price' => 600,
            'publish' => '2015-03-21',
            'author' => 'しまじろう',
            'stock' => 5 , ];
        DB::table('books')->insert($param);
        $param = [
            'title' => '学問のすゝめ',
            'isbn' => '133390123',
            'price' => 500,
            'publish' => '1900-05-10',
            'author' => '福沢諭吉',
            'stock' => 5 , ];
        DB::table('books')->insert($param);

    }
}
