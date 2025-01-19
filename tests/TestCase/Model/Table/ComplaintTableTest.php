<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComplaintTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComplaintTable Test Case
 */
class ComplaintTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComplaintTable
     */
    protected $Complaint;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Complaint',
        'app.Users',
        'app.Faculties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Complaint') ? [] : ['className' => ComplaintTable::class];
        $this->Complaint = $this->getTableLocator()->get('Complaint', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Complaint);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComplaintTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ComplaintTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
