<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessCategoriesTable Test Case
 */
class BusinessCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessCategoriesTable
     */
    public $BusinessCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.business_categories',
        'app.user_business_basic_details',
        'app.business_types',
        'app.users',
        'app.business_bank_details',
        'app.reset_password_hash',
        'app.user_address',
        'app.user_business_contact_details',
        'app.business_category'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusinessCategories') ? [] : ['className' => 'App\Model\Table\BusinessCategoriesTable'];
        $this->BusinessCategories = TableRegistry::get('BusinessCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessCategories);

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
}
