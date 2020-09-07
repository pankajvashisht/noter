<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin[]|\Cake\Collection\CollectionInterface $admins
 */
?>
<div class="admins index content">
    <?= $this->Html->link(__('New Admin'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Admins') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uuid') ?></th>
                    <th><?= $this->Paginator->sort('login') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('remember_me_token') ?></th>
                    <th><?= $this->Paginator->sort('last_logged_in') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= $this->Number->format($admin->id) ?></td>
                    <td><?= h($admin->uuid) ?></td>
                    <td><?= h($admin->login) ?></td>
                    <td><?= h($admin->password) ?></td>
                    <td><?= h($admin->name) ?></td>
                    <td><?= h($admin->active) ?></td>
                    <td><?= h($admin->remember_me_token) ?></td>
                    <td><?= h($admin->last_logged_in) ?></td>
                    <td><?= h($admin->created) ?></td>
                    <td><?= h($admin->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $admin->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
