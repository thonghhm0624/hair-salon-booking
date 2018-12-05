<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $reservation_id
 * @property int $reservation_status
 * @property string $reservation_date
 * @property string $reservation_time
 * @property int $reservation_marks
 * @property string $reservation_remark
 * @property string $customer_id
 * @property int $stylist_id
 * @property int $branch_id
 * @property int $service_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Stylist $stylist
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Service $service
 */
class Reservation extends Entity
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
        'reservation_status' => true,
        'reservation_date' => true,
        'reservation_time' => true,
        'reservation_marks' => true,
        'reservation_remark' => true,
        'customer_id' => true,
        'stylist_id' => true,
        'branch_id' => true,
        'service_id' => true,
        'customer' => true,
        'stylist' => true,
        'branch' => true,
        'service' => true
    ];
}
