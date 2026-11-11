<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PenjualanFixture
 */
class PenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'penjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'PenjualanID' => 1,
                'TanggalPenjualan' => '2026-11-11',
                'TotalHarga' => 1.5,
                'PelangganID' => 1,
            ],
        ];
        parent::init();
    }
}
