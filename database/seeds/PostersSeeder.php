<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posters')->insert([
           'title'  => 'Poster1',
           'user_id' => 2,
           'image' => 'https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
           'approved' => 1,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
           'slug' => 'poster-1'
        ]);

        \DB::table('posters')->insert([
            'title'  => 'Poster2',
            'user_id' => 2,
            'image' => 'https://image.shutterstock.com/image-photo/mountains-during-sunset-beautiful-natural-260nw-407021107.jpg',
            'approved' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'slug' => 'poster-2'
        ]);

        \DB::table('posters')->insert([
            'title'  => 'Poster3',
            'user_id' => 2,
            'image' => 'https://stimg.cardekho.com/images/carexteriorimages/930x620/Kia/Kia-Seltos/6232/1562746799300/front-left-side-47.jpg?tr=w-375,e-sharpen',
            'approved' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'slug' => 'poster-3'
        ]);

        \DB::table('posters')->insert([
            'title'  => 'Poster4',
            'user_id' => 2,
            'image' => 'https://cdn.pixabay.com/photo/2018/10/30/16/06/water-lily-3784022__340.jpg',
            'approved' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'slug' => 'poster-4'
        ]);

        \DB::table('posters')->insert([
            'title'  => 'Poster5',
            'user_id' => 2,
            'image' => 'https://media.gettyimages.com/photos/beautiful-book-picture-id865109088?s=612x612',
            'approved' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'slug' => 'poster-5'
        ]);
    }
}
