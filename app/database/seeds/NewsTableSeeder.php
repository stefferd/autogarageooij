<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class NewsTableSeeder extends Seeder {

    public function run() {
        DB::table('news')->delete();
        News::create(array(
            'title' => 'First news',
            'content' => 'First news message',
            'user_id' => 1,
            'active' => 1
        ));
    }
}