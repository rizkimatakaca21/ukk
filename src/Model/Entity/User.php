<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // ADDED
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nama
 * @property string $role
 * @property string|null $username ADDED
 * @property string|null $password ADDED
 */
class User extends Entity
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
        'nama' => true,
        'role' => true,
        'username' => true, // ADDED
        'password' => true, // ADDED
    ];

    /**
     * ADDED: Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

    /**
     * ADDED: Hash the password automatically whenever it is set.
     * An empty value keeps the current password, so editing a user
     * with a blank password field does not wipe it.
     *
     * @param string $password The plain-text password.
     * @return string|null
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $this->_fields['password'] ?? null;
    }
}