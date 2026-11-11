<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detailpenjualan Model
 *
 * @method \App\Model\Entity\Detailpenjualan newEmptyEntity()
 * @method \App\Model\Entity\Detailpenjualan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Detailpenjualan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Detailpenjualan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Detailpenjualan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Detailpenjualan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detailpenjualan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detailpenjualan> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetailpenjualanTable extends Table
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

        $this->setTable('detailpenjualan');
        $this->setDisplayField('DetailID');
        $this->setPrimaryKey('DetailID');

        // ADDED: relasi ke penjualan dan produk
        $this->belongsTo('Penjualan', [
            'foreignKey' => 'PenjualanID',
        ]);
        $this->belongsTo('Produk', [
            'foreignKey' => 'ProdukID',
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
        // CHANGED: PenjualanID tidak lagi wajib diisi dari form.
        // Saat disimpan lewat relasi hasMany, CakePHP mengisinya otomatis.
        $validator
            ->integer('PenjualanID')
            ->allowEmptyString('PenjualanID');

        $validator
            ->integer('ProdukID')
            ->requirePresence('ProdukID', 'create')
            ->notEmptyString('ProdukID');

        $validator
            ->integer('JumlahProduk')
            ->requirePresence('JumlahProduk', 'create')
            ->notEmptyString('JumlahProduk');

        $validator
            ->decimal('SubTotal')
            ->requirePresence('SubTotal', 'create')
            ->notEmptyString('SubTotal');

        return $validator;
    }
}