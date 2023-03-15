<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;
class SinhVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert(
            [
                [
                    'name' => Str::random(10),
                    'price' => '13',
                    'image' => Str::random(10),
                    'category' => Str::random(10),
                    'description' => Str::random(10),
                    'created_at' => new DateTime,

                ],
                [
                    'name' => Str::random(10),
                    'price' => '13',
                    'image' => Str::random(10),
                    'category' => Str::random(10),
                    'description' => Str::random(10),
                    'created_at' => new DateTime,
                ],
                [
                    'name' => Str::random(10),
                    'price' => '13',
                    'image' => Str::random(10),
                    'category' => Str::random(10),
                    'description' => Str::random(10),
                    'created_at' => new DateTime,
                ],
                [
                    'name' => Str::random(10),
                    'price' => '13',
                    'image' => Str::random(10),
                    'category' => Str::random(10),
                    'description' => Str::random(10),
                    'created_at' => new DateTime,
                ]
            ]
        );
    }
}
