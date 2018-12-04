<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Services Model
 *
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, callable $callback = null, $options = [])
 */
class ServicesTable extends Table
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

        $this->setTable('services');
        $this->setDisplayField('services_id');
        $this->setPrimaryKey('services_id');
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
            ->integer('service_id')
            ->allowEmpty('service_id', 'create');

        $validator
            ->scalar('service_name')
            ->maxLength('service_name', 50)
            ->requirePresence('service_name', 'create')
            ->notEmpty('service_name');

        $validator
            ->integer('service_duration')
            ->requirePresence('service_duration', 'create')
            ->notEmpty('service_duration');

        $validator
            ->integer('service_price')
            ->requirePresence('service_price', 'create')
            ->notEmpty('service_price');

        $validator
            ->scalar('service_image')
            ->allowEmpty('service_image');

        return $validator;
    }
}
