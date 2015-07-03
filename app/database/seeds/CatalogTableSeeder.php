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
        DB::table('projects')->delete();

        $this->entry('System Analyst', 'RVS', '2-1999', '5-2000');
        $this->entry('Technical Project Lead', 'Bit IC / Bortiboli Communications', '5-2000', '9-2003');
        $this->entry('Functional designer / trainer Documentum', 'Kluwer Academic Publisher', '9-2003', '1-2004');
        $this->entry('Test coordinator', 'Vegro', '2-2004', '3-2004');
        $this->entry('Test coordinator Documentum', 'Gemeente Amsterdam', '4-2004', '2-2006');
        $this->entry('Implementation Consultant', 'Eurail.com', '5-2006', '8-2006');
        $this->entry('Project Manager', 'Organon', '4-2006', '6-2007');
        $this->entry('Functional Designer Documentum', 'Essent', '7-2007', '8-2007');
        $this->entry('Functional Administrator Documentum', 'Essent', '9-2007', '3-2008');
        $this->entry('Project Manager', 'Eurail.com', '4-2008', '5-2010');
        $this->entry('Service Line Manager ECM', 'ITvisors', '3-2007', '10-2013');
        $this->entry('Senior Project Manager', 'Philips IT Applications', '2-2010', '10-2013');
        $this->entry('Owner', 'Juif Consultancy', '10-2013', 'present');
        $this->entry('Project Manager', 'Eurail.com', '11-2013', 'present');
    }

    private function entry($role, $customer, $start, $end) {
        $catalog = Catalog::create(array(
            'title' => $role . ' - ' . $customer,
            'description' => '',
            'user_id' => 1,
            'tags' => ''
        ));
        Project::create([
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