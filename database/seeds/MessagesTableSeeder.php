<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 2022.06.30..25.40追記 Lesson 13Chapter 11.2 新規Messageを3件作成する
        // DB::table('messages')->insert([
        //     'title' => 'test title 1',
        //     'content' => 'test content 1'
        // ]);
        // DB::table('messages')->insert([
        //     'title' => 'test title 2',
        //     'content' => 'test content 2'
        // ]);
        // DB::table('messages')->insert([
        //     'title' => 'test title 3',
        //     'content' => 'test content 3'
        // ]);
        
        for($i = 1; $i <= 100; $i++) {
            DB::table('messages')->insert([
                'title' => 'test title ' . $i,
                'content' => 'test content ' . $i
            ]);
        }
        
    }
}
