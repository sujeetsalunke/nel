<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 *
 * @property int $id
 * @property string $name
 * @property string $text_slider
 * @property string $link
 * @property string $image
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Slider extends Entity
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
        'name' => true,
        'text_slider' => true,
        'link' => true,
        'image' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
