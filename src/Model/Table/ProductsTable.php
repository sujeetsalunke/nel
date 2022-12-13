<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
          $this->hasMany('Galleries', [
            'foreignKey' => 'product_id'
        ]);
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
                ->scalar('name')
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->scalar('description')
                ->requirePresence('description', 'create')
                ->notEmpty('description');

        $validator
                ->scalar('image')
                ->requirePresence('image', 'create')
                ->notEmpty('image');

        $validator
                ->integer('status')
                ->requirePresence('status', 'create')
                ->notEmpty('status');

        return $validator;
    }

    public function uploadImage($image = null) {
        $alias_name = '';
        $img_name = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)), 0, 7);
        $upload_path = "img/product/main";
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
