<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Business Bank Details'), ['controller' => 'BusinessBankDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business Bank Detail'), ['controller' => 'BusinessBankDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reset Password Hash'), ['controller' => 'ResetPasswordHash', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reset Password Hash'), ['controller' => 'ResetPasswordHash', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Address'), ['controller' => 'UserAddress', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Addres'), ['controller' => 'UserAddress', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Business Basic Details'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Business Basic Detail'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Business Contact Details'), ['controller' => 'UserBusinessContactDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Business Contact Detail'), ['controller' => 'UserBusinessContactDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('middle_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('phone');
            echo $this->Form->control('password');
            echo $this->Form->control('status');
            echo $this->Form->control('is_verified');
            echo $this->Form->control('is_approved');
            echo $this->Form->control('is_deleted', ['empty' => true]);
            echo $this->Form->control('remark');
            echo $this->Form->control('approved_by');
            echo $this->Form->control('last_modified_by');
            echo $this->Form->control('uuid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
