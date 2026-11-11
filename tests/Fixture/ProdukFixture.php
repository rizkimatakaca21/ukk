<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdukFixture
 */
class ProdukFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'produk';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ProdukID' => 1,
                'NamaProduk' => 'Lorem ipsum dolor sit amet',
                'Harga' => 1.5,
                'Stok' => 1,
            ],
        ];
        parent::init();
    }
}
