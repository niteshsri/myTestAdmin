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
                ['action' => 'delete', $businessCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $businessCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Business Category'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User Business Basic Details'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Business Basic Detail'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessCategory form large-9 medium-8 columns content">
    <?= $this->Form->create($businessCategory) ?>
    <fieldset>
        <legend><?= __('Edit Business Category') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('label');
            echo $this->Form->control('status');
            echo $this->Form->control('is_deleted', ['empty' => true]);
            echo $this->Form->control('last_modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
