<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usertype Entity
 *
 * @property int $id
 * @property string $user_type
 * @property string $user_name
 * @property int $nric
 * @property string $email
 * @property int $phone_number
 * @property string $street1
 * @property string $street2
 * @property int $postcode
 * @property string $city
 * @property string $state
 * @property string $status
 * @property int $created
 * @property int $modified
 */
class Usertype extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_type' => true,
        'user_name' => true,
        'nric' => true,
        'email' => true,
        'phone_number' => true,
        'street1' => true,
        'street2' => true,
        'postcode' => true,
        'city' => true,
        'state' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
    ];
}
