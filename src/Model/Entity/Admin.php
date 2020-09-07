<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $login
 * @property string|null $password
 * @property string|null $name
 * @property bool|null $active
 * @property string|null $remember_me_token
 * @property FrozenTime|null $last_logged_in
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 */
class Admin extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'uuid' => true,
        'login' => true,
        'password' => true,
        'name' => true,
        'active' => true,
        'remember_me_token' => true,
        'last_logged_in' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
