<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property int $product_category_id
 * @property string $product_title
 * @property string $product_description
 * @property string $product_image
 * @property string $product_keyword
 * @property string $product_content
 */
class Product extends Entity
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
        'product_category_id' => true,
        'product_title' => true,
        'product_description' => true,
        'product_image' => true,
        'product_keyword' => true,
        'product_content' => true
    ];
}
