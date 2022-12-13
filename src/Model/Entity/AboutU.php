<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AboutU Entity
 *
 * @property int $id
 * @property string $title
 * @property string $image_1
 * @property string $description_1
 * @property string $image_2
 * @property string $description_2
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class AboutU extends Entity
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
        'title' => true,
        'image_1' => true,
        'description_1' => true,
        'image_2' => true,
        'description_2' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
