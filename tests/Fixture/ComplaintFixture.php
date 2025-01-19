<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComplaintFixture
 */
class ComplaintFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'complaint';
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
                'user_id' => 1,
                'department_id' => 1,
                'faculty_id' => 1,
                'complaint_type' => 'Lorem ipsum dolor ',
                'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1,
                'modified' => 1,
            ],
        ];
        parent::init();
    }
}
