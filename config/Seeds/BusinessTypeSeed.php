<?php
use Phinx\Seed\AbstractSeed;

/**
 * Roles seed.
 */
class BusinessTypeSeed extends AbstractSeed
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
                    [ 'name'    => 'individual',
                      'label'   =>'Individual',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'govt_agency',
                      'label'   =>'Govt. Agency',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'llp',
                      'label'   =>'Limited Liability Partnership',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'partnership',
                      'label'   =>'Partnership',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'pvt_ltd',
                      'label'   =>'Private Limited Company',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'pub_ltd',
                      'label'   =>'Public Limited Company',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'education',
                      'label'   =>'School, Society, College',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),],
                      [ 'name'    => 'proprietorship',
                      'label'   =>'Sole Proprietorship',
                      'status'=> 1,
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s'),]
        ];

        $table = $this->table('business_types');
        $table->insert($data)->save();
    }
}
