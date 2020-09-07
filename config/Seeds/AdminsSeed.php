<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Utility\Text;
/**
 * Admins seed.
 */
class AdminsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $data = [
            [
                'uuid' => Text::uuid(),
                'login' => 'admin-one',
                'password' => $hasher->hash('adminone'),
                'name' => 'JD Singh',
                'active' => '1',
                'remember_me_token' => '',
                'last_logged_in' => '2020-09-09 09:09:09',
                'created' => '2020-09-09 09:06:09',
                'modified' => '2020-09-09 09:09:06',
            ],
        ];

        $table = $this->table('admins');
        $table->insert($data)->save();
    }
}
