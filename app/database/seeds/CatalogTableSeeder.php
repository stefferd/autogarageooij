<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class CatalogTableSeeder extends Seeder {

    public function run() {
        DB::table('catalog')->delete();
        DB::table('cars')->delete();

        /* Put the entries here */
    }

    private function entry($role, $customer, $start, $end) {
        $catalog = Catalog::create(array(
            'title' => $role . ' - ' . $customer,
            'description' => '',
            'user_id' => 1,
            'tags' => ''
        ));
        Car::create([
            'role' => $role,
            'customer' => $customer,
            'start' => $start,
            'end' => $end,
            'main_pic' => '',
            'catalog_id' => $catalog->id,
            'user_id' => 1
        ]);
    }
}