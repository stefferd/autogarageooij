<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class PageTableSeeder extends Seeder {

    public function run() {
        DB::table('page')->delete();
        Page::create(array(
            'title' => 'Home',
            'content' => 'Home content',
            'user_id' => 1,
            'keywords' => 'home',
            'description' => 'Home',
            'type' => 1,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'About us',
            'content' => '',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 1,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'Other page',
            'content' => 'others page',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 1,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'Contact',
            'content' => 'Contact us with the following information:',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 2,
            'start' => 1,
            'active' => 1
        ));
    }
}