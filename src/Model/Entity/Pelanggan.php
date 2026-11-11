<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pelanggan Entity
 *
 * @property int $PelangganID
 * @property string $NamaPelanggan
 * @property string $Alamat
 * @property string $NomorTelp
 */
class Pelanggan extends Entity
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
        'NamaPelanggan' => true,
        'Alamat' => true,
        'NomorTelp' => true,
    ];
}
