<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CmsPages Model
 *
 * @method \App\Model\Entity\CmsPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\CmsPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CmsPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CmsPage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CmsPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CmsPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CmsPage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CmsPagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cms_pages');
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('display_name')
            ->requirePresence('display_name', 'create')
            ->notEmpty('display_name');

        $validator
            ->scalar('meta_title')
            ->requirePresence('meta_title', 'create')
            ->notEmpty('meta_title');

        $validator
            ->scalar('meta_keyword')
            ->requirePresence('meta_keyword', 'create')
            ->notEmpty('meta_keyword');

        $validator
            ->scalar('meta_description')
            ->requirePresence('meta_description', 'create')
            ->notEmpty('meta_description');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
