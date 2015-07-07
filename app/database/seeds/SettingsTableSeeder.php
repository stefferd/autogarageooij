<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class SettingsTableSeeder extends Seeder {

    public function run() {
        DB::table('settings')->delete();
        Settings::create(array(
            'key' => 'contact_email',
            'value' => 'info@domaim.com',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_intro',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_name',
            'value' => 'Administrator',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_phone',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_mobile',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_website',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'social_linkedin',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'social_facebook',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'social_youtube',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'hours_weekly',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'hours_weekend',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'hours_title',
            'value' => '',
            'user_id' => 1
        ));
    }
}