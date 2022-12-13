<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CmsPage Entity
 *
 * @property int $id
 * @property string $title
 * @property string $display_name
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $description
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class CmsPage extends Entity
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
        'display_name' => true,
        'meta_title' => true,
        'meta_keyword' => true,
        'meta_description' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
