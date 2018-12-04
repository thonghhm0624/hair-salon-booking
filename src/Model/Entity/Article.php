<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $article_id
 * @property int $article_category_id
 * @property string $article_title
 * @property string $article_description
 * @property string $article_image
 * @property string $article_keyword
 * @property string $article_content
 */
class Article extends Entity
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
        'article_category_id' => true,
        'article_title' => true,
        'article_description' => true,
        'article_image' => true,
        'article_keyword' => true,
        'article_content' => true
    ];
}
