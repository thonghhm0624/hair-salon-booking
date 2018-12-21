<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 *
 */
class CustomersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'customer_id' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'customer_password' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => '123', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'customer_name' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => 'Customer', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'customer_status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['customer_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'customer_id' => 'b8711c23-f2f9-41e4-9c85-62bead4a51a8',
            'customer_password' => 'Lorem ipsu',
            'customer_name' => 'Lorem ipsum dolor sit amet',
            'customer_status' => 1
        ],
    ];
}
