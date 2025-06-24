<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActorsMovies Model
 *
 * @property \App\Model\Table\ActorsTable&\Cake\ORM\Association\BelongsTo $Actors
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 *
 * @method \App\Model\Entity\ActorsMovie newEmptyEntity()
 * @method \App\Model\Entity\ActorsMovie newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ActorsMovie> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActorsMovie get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ActorsMovie findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ActorsMovie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ActorsMovie> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActorsMovie|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ActorsMovie saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ActorsMovie>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ActorsMovie>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ActorsMovie>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ActorsMovie> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ActorsMovie>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ActorsMovie>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ActorsMovie>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ActorsMovie> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ActorsMoviesTable extends Table
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

        $this->setTable('actors_movies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Actors', [
            'foreignKey' => 'actor_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER',
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
            ->integer('actor_id')
            ->notEmptyString('actor_id');

        $validator
            ->integer('movie_id')
            ->notEmptyString('movie_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['actor_id'], 'Actors'), ['errorField' => 'actor_id']);
        $rules->add($rules->existsIn(['movie_id'], 'Movies'), ['errorField' => 'movie_id']);

        return $rules;
    }
}
