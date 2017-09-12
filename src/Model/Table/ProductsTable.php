<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $Productfaqs
 * @property \Cake\ORM\Association\HasMany $Productimages
 * @property \Cake\ORM\Association\HasMany $Testimonials
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class ProductsTable extends Table
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

        $this->table('products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Productfaqs', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Productimages', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Testimonials', [
            'foreignKey' => 'product_id'
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
            ->integer('id')            ->allowEmpty('id', 'create');
        $validator
            ->scalar('product_code')            ->requirePresence('product_code', 'create')            ->notEmpty('product_code');
        $validator
            ->scalar('product_name')            ->requirePresence('product_name', 'create')            ->notEmpty('product_name');
        $validator
            ->scalar('description')            ->requirePresence('description', 'create')            ->notEmpty('description');
        $validator
            ->decimal('price')            ->requirePresence('price', 'create')            ->notEmpty('price');
        $validator
            ->scalar('tags')            ->requirePresence('tags', 'create')            ->notEmpty('tags');
        $validator
            ->scalar('main_image')            ->allowEmpty('main_image');
        $validator
            ->requirePresence('status', 'create')            ->notEmpty('status');
        $validator
            ->requirePresence('stock_status', 'create')            ->notEmpty('stock_status');
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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
