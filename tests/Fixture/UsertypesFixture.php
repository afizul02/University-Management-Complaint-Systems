<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsertypesFixture
 */
class UsertypesFixture extends TestFixture
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
                'user_type' => 'Lorem ip',
                'user_name' => 'Lorem ipsum dolor sit amet',
                'nric' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 1,
                'street1' => 'Lorem ipsum dolor ',
                'street2' => 'Lorem ipsum dolor ',
                'postcode' => 1,
                'city' => 'Lorem ipsum dolor ',
                'state' => 'Lorem ipsum dolor ',
                'status' => 'Lorem ip',
                'created' => 1,
                'modified' => 1,
            ],
        ];
        parent::init();
    }
}
