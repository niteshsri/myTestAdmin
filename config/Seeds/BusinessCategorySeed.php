<?php
use Phinx\Seed\AbstractSeed;

/**
 * Roles seed.
 */
class BusinessCategorySeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [ 'name'    => 'advertising',
                      'label'   =>'Advertising',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'advisory_services',
                      'label'   =>'Advisory Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'apparels_accessories',
                      'label'   =>'Apparels & Accessories',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'automobile_parts_services',
                      'label'   =>'Automobile Parts and services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'b2b',
                      'label'   =>'B2B',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'beauty_health_grocery',
                      'label'   =>'Beauty, Health & Grocery',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'books_stationery',
                      'label'   =>'Books/Stationery',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'courier_services',
                      'label'   =>'Courier Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'craft_painting',
                      'label'   =>'Craft & Painting',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'educational_services',
                      'label'   =>'Educational Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'electronics_computers',
                      'label'   =>'Electronics/Computers',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'flowers_gift_toys',
                      'label'   =>'Flowers, Gift & Toys',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'healthcare',
                      'label'   =>'Healthcare Service',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'home_garden_tools',
                      'label'   =>'Home, Garden & Tools',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'hr_services',
                      'label'   =>'HR Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'movies_music_events_tickets',
                      'label'   =>'Movies, Music & Events Tickets',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'ngo',
                      'label'   =>'NGO',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'publishing',
                      'label'   =>'Publishing',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'recharge_services',
                      'label'   =>'Recharge Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'software_services',
                      'label'   =>'Software services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'subscription_services',
                      'label'   =>'Subscription Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'travel_agencies_tour_operators',
                      'label'   =>'Travel Agencies and Tour Operators',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'utility_services',
                      'label'   =>'Utility Services',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'web_hosting_domain_names',
                      'label'   =>'Web Hosting & Domain Names',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'wholesaler',
                      'label'   =>'Wholesaler',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),]
        ];

        $table = $this->table('business_categories');
        $table->insert($data)->save();
    }
}
