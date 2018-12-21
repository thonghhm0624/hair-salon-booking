<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stylist Entity
 *
 * @property int $stylist_id
 * @property int $stylist_branch_id
 * @property string $stylist_name
 * @property string $stylist_password
 * @property string $stylist_image
 * @property int $stylist_status
 * @property string $stylist_phone
 */
class Stylist extends Entity
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
        'stylist_branch_id' => true,
        'stylist_name' => true,
        'stylist_password' => true,
        'stylist_image' => true,
        'stylist_status' => true,
        'stylist_phone' => true
    ];
}
