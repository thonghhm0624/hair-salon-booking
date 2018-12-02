<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Collection Entity
 *
 * @property int $id
 * @property string $slug
 * @property string $image
 * @property string $name
 * @property bool $to_homepage
 * @property \Cake\I18n\Time $created
 */
class Collection extends Entity
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
        'slug' => true,
        'image' => true,
        'name' => true,
        'to_homepage' => true,
        'created' => true
    ];
}
