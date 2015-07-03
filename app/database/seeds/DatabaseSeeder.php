<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->call('SettingsTableSeeder');
		$this->call('CatalogTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('NewsTableSeeder');
	}

}
