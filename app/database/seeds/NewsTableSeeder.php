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
    }
}