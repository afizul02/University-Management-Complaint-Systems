<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Complaint Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $department_id
 * @property int $faculty_id
 * @property string $complaint_type
 * @property string $comment
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Faculty $faculty
 */
class Complaint extends Entity
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
        'user_id' => true,
        'department_id' => true,
        'faculty_id' => true,
        'complaint_type' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'faculty' => true,
    ];
}
