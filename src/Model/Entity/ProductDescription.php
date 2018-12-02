<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDescription Entity
 *
 * @property int $id
 * @property string $name
 * @property string $textblock_1
 * @property string $imageblock_1
 * @property string $textblock_2
 * @property string $imageblock_2
 * @property string $textblock_3
 * @property string $imageblock_3
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ProductDescription extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'textblock_1' => true,
        'imageblock_1' => true,
        'textblock_2' => true,
        'imageblock_2' => true,
        'textblock_3' => true,
        'imageblock_3' => true,
        'created' => true,
        'modified' => true
    ];
}
