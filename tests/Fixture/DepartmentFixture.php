<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmentFixture
 */
class DepartmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'department';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'department_name' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ip',
                'created' => 1,
                'modified' => 1,
            ],
        ];
        parent::init();
    }
}
