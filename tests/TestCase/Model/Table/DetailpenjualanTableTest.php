<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailpenjualanTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailpenjualanTable Test Case
 */
class DetailpenjualanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailpenjualanTable
     */
    protected $Detailpenjualan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Detailpenjualan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Detailpenjualan') ? [] : ['className' => DetailpenjualanTable::class];
        $this->Detailpenjualan = $this->getTableLocator()->get('Detailpenjualan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Detailpenjualan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DetailpenjualanTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
