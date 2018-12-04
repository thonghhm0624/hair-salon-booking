<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stylists Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $StylistBranches
 *
 * @method \App\Model\Entity\Stylist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stylist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stylist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stylist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stylist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stylist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stylist findOrCreate($search, callable $callback = null, $options = [])
 */
class StylistsTable extends Table
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

        $this->setTable('stylists');
        $this->setDisplayField('stylist_id');
        $this->setPrimaryKey('stylist_id');
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
            ->integer('stylist_id')
            ->allowEmpty('stylist_id', 'create');

        $validator
            ->scalar('stylist_name')
            ->maxLength('stylist_name', 30)
            ->requirePresence('stylist_name', 'create')
            ->notEmpty('stylist_name');

        $validator
            ->scalar('stylist_password')
            ->maxLength('stylist_password', 10)
            ->requirePresence('stylist_password', 'create')
            ->notEmpty('stylist_password');

        $validator
            ->scalar('stylist_image')
            ->allowEmpty('stylist_image');

        $validator
            ->integer('stylist_status')
            ->requirePresence('stylist_status', 'create')
            ->notEmpty('stylist_status');

        $validator
            ->scalar('stylist_phone')
            ->maxLength('stylist_phone', 15)
            ->requirePresence('stylist_phone', 'create')
            ->notEmpty('stylist_phone');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }
}
