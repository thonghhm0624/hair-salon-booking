<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductDescriptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductDescriptionsTable Test Case
 */
class ProductDescriptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductDescriptionsTable
     */
    public $ProductDescriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_descriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductDescriptions') ? [] : ['className' => ProductDescriptionsTable::class];
        $this->ProductDescriptions = TableRegistry::get('ProductDescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductDescriptions);

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
