<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; 


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('songs')->insert([
            'title' => Str::random(10),
            'url' => "https://file-examples.com/storage/fe037418ca623f4ca9d3a0c/2017/11/file_example_MP3_700KB.mp3",
            'thumbnail_url' =>  "/img/image2.png",
            'note' =>rand(0,20),
            'user_id' => 1
        ]);
        DB::table('songs')->insert([
            'title' => Str::random(10),
            'url' => "https://file-examples.com/storage/fe037418ca623f4ca9d3a0c/2017/11/file_example_MP3_700KB.mp3",
            'thumbnail_url' =>  "/img/image2.png",
            'note' =>rand(0,20),
            'user_id' => 1
        ]);
        DB::table('songs')->insert([
            'title' => Str::random(10),
            'url' => "https://file-examples.com/storage/fe037418ca623f4ca9d3a0c/2017/11/file_example_MP3_700KB.mp3",
            'thumbnail_url' =>  "/img/image2.png",
            'note' =>rand(0,20),
            'user_id' => 2
        ]);
        DB::table('playlists')->insert([
            'title' => "Ma super playlist",
            'user_id' => "2"

        ]);
        DB::table('playlist_song')->insert([
            'playlist_id' => "1",
            'song_id' => "2"

        ]);

        DB::table('playlist_song')->insert([
            'playlist_id' => "1",
            'song_id' => "3"

        ]);
    }

    
}

?>