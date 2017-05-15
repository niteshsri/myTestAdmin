<?php
use Phinx\Seed\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
/**
 * Roles seed.
 */
class AdminSeed extends AbstractSeed
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
      $hasher = new DefaultPasswordHasher();
        $data = [
                    [ 'first_name'    => 'admin',
                      'username'   =>'admin',
                      'email'   =>'admin@admin.com',
                      'password'   =>$hasher->hash('12345678'),
                      'uuid'=>Text::uuid(),
                      'role_id'=>'1',
                      'status'=>'1',
                      'is_verified'=>'1',
                      'is_approved'=>'1',
                      'created' => date('Y-m-d H:i:s'),
                      'modified'=> date('Y-m-d H:i:s')
                      ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
