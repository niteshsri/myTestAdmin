<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Business Basic Details'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Business Basic Detail'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessCategory index large-9 medium-8 columns content">
    <h3><?= __('Business Category') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_modified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessCategory as $businessCategory): ?>
            <tr>
                <td><?= $this->Number->format($businessCategory->id) ?></td>
                <td><?= h($businessCategory->name) ?></td>
                <td><?= h($businessCategory->label) ?></td>
                <td><?= h($businessCategory->status) ?></td>
                <td><?= h($businessCategory->is_deleted) ?></td>
                <td><?= $this->Number->format($businessCategory->last_modified_by) ?></td>
                <td><?= h($businessCategory->created) ?></td>
                <td><?= h($businessCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
