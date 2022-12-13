<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $material_id
 * @property int $category_id
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\Category $category
 */
class Gallery extends Entity {

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
        'project_id' => true,
        'product_id' => true,
        'material_id' => true,
        'category_id' => true,
        'image' => true,
        'location' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'project' => true,
        'material' => true,
        'category' => true
    ];

}
