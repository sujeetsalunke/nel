<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectDetail Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $text_details
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class ProjectDetail extends Entity {

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
        'text_details' => true,
        'image' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];

}
