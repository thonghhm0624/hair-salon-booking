<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StylistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StylistsTable Test Case
 */
class StylistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StylistsTable
     */
    public $Stylists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stylists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stylists') ? [] : ['className' => StylistsTable::class];
        $this->Stylists = TableRegistry::get('Stylists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stylists);

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
