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
            <?= $this->Html->link(__('List Admins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="admins form content">
            <?= $this->Form->create($admin) ?>
            <fieldset>
                <legend><?= __('Add Admin') ?></legend>
                <?php
                    echo $this->Form->control('uuid');
                    echo $this->Form->control('login');
                    echo $this->Form->control('password');
                    echo $this->Form->control('name');
                    echo $this->Form->control('active');
                    echo $this->Form->control('remember_me_token');
                    echo $this->Form->control('last_logged_in', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
