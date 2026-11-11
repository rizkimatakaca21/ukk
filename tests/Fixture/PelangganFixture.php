<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PelangganFixture
 */
class PelangganFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'pelanggan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'PelangganID' => 1,
                'NamaPelanggan' => 'Lorem ipsum dolor sit amet',
                'Alamat' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'NomorTelp' => 'Lorem ipsum d',
            ],
        ];
        parent::init();
    }
}
