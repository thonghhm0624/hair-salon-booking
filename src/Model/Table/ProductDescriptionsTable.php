<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductDescriptions Model
 *
 * @method \App\Model\Entity\ProductDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductDescription newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductDescription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductDescription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductDescriptionsTable extends Table
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

        $this->setTable('product_descriptions');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->scalar('textblock_1')
            ->allowEmpty('textblock_1');

        $validator
            ->scalar('imageblock_1')
            ->maxLength('imageblock_1', 255)
            ->allowEmpty('imageblock_1');

        $validator
            ->scalar('textblock_2')
            ->allowEmpty('textblock_2');

        $validator
            ->scalar('imageblock_2')
            ->maxLength('imageblock_2', 255)
            ->allowEmpty('imageblock_2');

        $validator
            ->scalar('textblock_3')
            ->allowEmpty('textblock_3');

        $validator
            ->scalar('imageblock_3')
            ->maxLength('imageblock_3', 255)
            ->allowEmpty('imageblock_3');

        return $validator;
    }
}
