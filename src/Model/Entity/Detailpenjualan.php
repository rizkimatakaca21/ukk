<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detailpenjualan Entity
 *
 * @property int $DetailID
 * @property int $PenjualanID
 * @property int $ProdukID
 * @property int $JumlahProduk
 * @property string $SubTotal
 */
class Detailpenjualan extends Entity
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
        'PenjualanID' => true,
        'ProdukID' => true,
        'JumlahProduk' => true,
        'SubTotal' => true,
    ];
}
