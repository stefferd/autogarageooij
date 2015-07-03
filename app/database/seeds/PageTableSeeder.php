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
            'title' => 'Profile',
            'content' => 'Mr. Janssen has a long background in the Information and Communication Technology. He started his career as a programmer and system analyst in different environments. Mr. Janssen has developed himself from an all round content management developer and consultant into an experienced project manager, specialised in internet related projects. He is result driven, eager to adapt new technologies and environments and has excellent communications skills.',
            'user_id' => 1,
            'keywords' => 'juif, consultancy, manfred, janssen, manfred janssen, beuningen, e-commerce, freelance, zzp',
            'description' => 'Juif consultancy is de freelance E-commerce specialist voor uw project',
            'type' => 1,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'Experience',
            'content' => '',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 3,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'Skills',
            'content' => '<span class="round label">Project Management</span>
<span class="round label">Content Management</span>
<span class="round label">Enterprise Content Management</span>
<span class="round label">PRINCE2</span>
<span class="round label">Agile Project Management</span>
<span class="round label">E-commerce</span>
<span class="round label">Information Management</span>
<span class="round label">Document Management</span>
<span class="round label">ITIL</span>
<span class="round label">Documentum</span>
<span class="round label">Web Content Management</span>
<span class="round label">Scrum</span>
<span class="round label">Business Process</span>
<span class="round label">Agile Methodologies</span>
<span class="round label">Testing</span>
<span class="round label">Sharepoint</span>
<span class="round label">Software Development</span>',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 1,
            'start' => 1,
            'active' => 1
        ));

        Page::create(array(
            'title' => 'Contact',
            'content' => 'Contact us with the following information:
<address>
                            <abbr title="Mobile">M:</abbr> <a href="tel:+31653318849" title="+31 (0)6 53 31 78 49">+31 (0)6 53 31 78 49</a><br />
                            <abbr title="E-mail">E:</abbr> <a href="mailto:info@juifconsultancy.nl" title="info@juifconsultancy.nl">info@juifconsultancy.nl</a><br />
                            <abbr title="Website">W:</abbr> <a href="http://www.juifconsultancy.nl" title="www.juifconsultancy.nl">www.juifconsultancy.nl</a><br />
                        </address>',
            'user_id' => 1,
            'keywords' => '',
            'description' => '',
            'type' => 2,
            'start' => 1,
            'active' => 1
        ));
    }
}