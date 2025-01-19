<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacultiesFixture
 */
class FacultiesFixture extends TestFixture
{
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
                'faculty_name' => 'Lorem ipsum dolor sit amet',
                'faculty_code' => 'Lorem ip',
                'status' => 'Lorem ip',
                'created' => 1,
                'modified' => 1,
            ],
        ];
        parent::init();
    }
}
