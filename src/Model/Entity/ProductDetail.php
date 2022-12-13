<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductDetail Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $text_details
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ProductDetail extends Entity {

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
        'product_id' => true,
        'name' => true,
        'cft_img_1' => true,
        'cft_img_2' => true,
        'sizes' => true,
        'varient' => true,
        'cft_description' => true,
        'color_image' => true,
//        'csn_img_2' => true,
//        'csn_description' => true,
        'install_text' => true,
        'install_img' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];

}
