<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductColorImage Entity
 *
 * @property int $id
 * @property int $project_detail_id
 * @property string $name
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProjectDetail $project_detail
 */
class ProductColorImage extends Entity
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
        'product_detail_id' => true,
        'name' => true,
         'type' => true,
        'image' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'product_detail' => true
    ];
}
