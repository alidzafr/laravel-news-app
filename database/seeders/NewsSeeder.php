<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i < 6; $i++){
            \DB::table('news')->insert([
                'user_id' => 1,
                'title' => $faker->title,
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis expedita odio veritatis aspernatur. Odio optio ab eligendi molestiae expedita illo voluptatibus! Hic, magni labore!',
                'picture' => 'uploads/JZZvEEZU62v0xTxLJMLglDyxYebYU0PNbGL82DcP.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
