<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsertypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsertypesTable Test Case
 */
class UsertypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsertypesTable
     */
    protected $Usertypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Usertypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Usertypes') ? [] : ['className' => UsertypesTable::class];
        $this->Usertypes = $this->getTableLocator()->get('Usertypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Usertypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsertypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
