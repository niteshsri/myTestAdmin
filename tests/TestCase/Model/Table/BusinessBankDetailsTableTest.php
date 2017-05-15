<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessBankDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessBankDetailsTable Test Case
 */
class BusinessBankDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessBankDetailsTable
     */
    public $BusinessBankDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.business_bank_details',
        'app.user_business_basic_details',
        'app.business_types',
        'app.users',
        'app.roles',
        'app.reset_password_hash',
        'app.user_address',
        'app.user_business_contact_details',
        'app.business_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusinessBankDetails') ? [] : ['className' => 'App\Model\Table\BusinessBankDetailsTable'];
        $this->BusinessBankDetails = TableRegistry::get('BusinessBankDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessBankDetails);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
