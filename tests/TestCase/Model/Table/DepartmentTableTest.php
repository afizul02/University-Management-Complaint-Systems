<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentTable Test Case
 */
class DepartmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentTable
     */
    protected $Department;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Department',
        'app.Complaint',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Department') ? [] : ['className' => DepartmentTable::class];
        $this->Department = $this->getTableLocator()->get('Department', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Department);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DepartmentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
