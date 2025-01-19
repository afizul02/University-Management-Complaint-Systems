<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usertypes Model
 *
 * @method \App\Model\Entity\Usertype newEmptyEntity()
 * @method \App\Model\Entity\Usertype newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Usertype> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usertype get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Usertype findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Usertype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Usertype> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usertype|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Usertype saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Usertype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usertype>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usertype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usertype> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usertype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usertype>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usertype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usertype> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsertypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('usertypes');
        $this->setDisplayField('user_type');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['id'],
				]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_type')
            ->maxLength('user_type', 10)
            ->requirePresence('user_type', 'create')
            ->notEmptyString('user_type');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 50)
            ->requirePresence('user_name', 'create')
            ->notEmptyString('user_name');

        $validator
            ->integer('nric')
            ->requirePresence('nric', 'create')
            ->notEmptyString('nric');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->integer('phone_number')
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('street1')
            ->maxLength('street1', 20)
            ->requirePresence('street1', 'create')
            ->notEmptyString('street1');

        $validator
            ->scalar('street2')
            ->maxLength('street2', 20)
            ->requirePresence('street2', 'create')
            ->notEmptyString('street2');

        $validator
            ->integer('postcode')
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode');

        $validator
            ->scalar('city')
            ->maxLength('city', 20)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 20)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('status')
            ->maxLength('status', 10)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
