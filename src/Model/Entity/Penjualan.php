<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Penjualan Entity
 *
 * @property int $PenjualanID
 * @property \Cake\I18n\Date $TanggalPenjualan
 * @property string $TotalHarga
 * @property int $PelangganID
 * @property array<\App\Model\Entity\Detailpenjualan> $detailpenjualan ADDED
 */
class Penjualan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'TanggalPenjualan' => true,
        'TotalHarga' => true,
        'PelangganID' => true,
        'detailpenjualan' => true, 
    ];
}