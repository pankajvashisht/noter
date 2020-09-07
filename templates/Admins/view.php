<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Admin'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Admins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Admin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admins view content">
            <h3><?= h($admin->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($admin->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Login') ?></th>
                    <td><?= h($admin->login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($admin->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($admin->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Remember Me Token') ?></th>
                    <td><?= h($admin->remember_me_token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admin->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Logged In') ?></th>
                    <td><?= h($admin->last_logged_in) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($admin->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($admin->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $admin->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
