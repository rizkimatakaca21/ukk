<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailpenjualanFixture
 */
class DetailpenjualanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'detailpenjualan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'DetailID' => 1,
                'PenjualanID' => 1,
                'ProdukID' => 1,
                'JumlahProduk' => 1,
                'SubTotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
