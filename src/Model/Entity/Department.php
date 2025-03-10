<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property string $department_name
 * @property string $status
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\Complaint[] $complaint
 */
class Department extends Entity
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
        'department_name' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'complaint' => true,
    ];
}
