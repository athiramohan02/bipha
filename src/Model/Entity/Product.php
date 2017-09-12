<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $product_code
 * @property string $product_name
 * @property string $description
 * @property float $price
 * @property string $tags
 * @property string $main_image
 * @property int $status
 * @property int $stock_status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Productfaq[] $productfaqs
 * @property \App\Model\Entity\Productimage[] $productimages
 * @property \App\Model\Entity\Testimonial[] $testimonials
 */class Product extends Entity
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
        '*' => true,
        'id' => false
    ];
}
