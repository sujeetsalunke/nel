<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AboutUs Model
 *
 * @method \App\Model\Entity\AboutU get($primaryKey, $options = [])
 * @method \App\Model\Entity\AboutU newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AboutU[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AboutU|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AboutU patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AboutU[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AboutU findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AboutUsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('about_us');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('title')
                ->requirePresence('title', 'create')
                ->notEmpty('title');

        $validator
                ->scalar('image_1')
                ->requirePresence('image_1', 'create')
                ->notEmpty('image_1');

        $validator
                ->scalar('description_1')
                ->requirePresence('description_1', 'create')
                ->notEmpty('description_1');

        $validator
                ->scalar('image_2')
                ->requirePresence('image_2', 'create')
                ->notEmpty('image_2');

        $validator
                ->scalar('description_2')
                ->requirePresence('description_2', 'create')
                ->notEmpty('description_2');

        $validator
                ->integer('status')
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

    public function uploadImage1($image = null) {
        $alias_name = '';
        $img_name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 7);
        $upload_path = "img/about_us";
        if ($image['error'] == UPLOAD_ERR_OK) {
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            if (strtolower($ext) == 'png' || strtolower($ext) == 'jpg' || strtolower($ext) == 'gif' || strtolower($ext) == 'ico') {
                if (move_uploaded_file($image['tmp_name'], $upload_path . DS . $img_name . "." . $ext)) {
                    $alias_name = $img_name . "." . $ext;
                }
            }
        }

        return $alias_name;
    }

    public function uploadImage2($image = null) {
        $alias_name = '';
        $img_name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 7);
        $upload_path = "img/about_us";
        if ($image['error'] == UPLOAD_ERR_OK) {
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            if (strtolower($ext) == 'png' || strtolower($ext) == 'jpg' || strtolower($ext) == 'gif' || strtolower($ext) == 'ico') {
                if (move_uploaded_file($image['tmp_name'], $upload_path . DS . $img_name . "." . $ext)) {
                    $alias_name = $img_name . "." . $ext;
                }
            }
        }

        return $alias_name;
    }

}
