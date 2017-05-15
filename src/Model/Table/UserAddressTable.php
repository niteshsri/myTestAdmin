<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserAddress Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserAddres get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserAddres newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserAddres[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserAddres|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAddres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserAddres[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserAddres findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserAddressTable extends Table
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

        $this->setTable('user_address');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('address1', 'create')
            ->notEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->requirePresence('zip', 'create')
            ->notEmpty('zip');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('is_verified')
            ->allowEmpty('is_verified');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->allowEmpty('remark');

        $validator
            ->integer('approved_by')
            ->allowEmpty('approved_by');

        $validator
            ->integer('last_modified_by')
            ->allowEmpty('last_modified_by');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
