<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Customers
 * @property |\Cake\ORM\Association\BelongsTo $Stylists
 * @property |\Cake\ORM\Association\BelongsTo $Branches
 * @property |\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('reservation_id');
        $this->setPrimaryKey('reservation_id');

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
            ->integer('reservation_id')
            ->allowEmpty('reservation_id', 'create');

        $validator
            ->integer('reservation_status')
            ->requirePresence('reservation_status', 'create')
            ->notEmpty('reservation_status');

        $validator
            ->scalar('reservation_date')
            ->maxLength('reservation_date', 11)
            ->requirePresence('reservation_date', 'create')
            ->notEmpty('reservation_date');

        $validator
            ->integer('reservation_time')
            ->requirePresence('reservation_time', 'create')
            ->notEmpty('reservation_time');

        $validator
            ->integer('reservation_marks')
            ->requirePresence('reservation_marks', 'create')
            ->notEmpty('reservation_marks');

        $validator
            ->scalar('reservation_remark')
            ->allowEmpty('reservation_remark');

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
