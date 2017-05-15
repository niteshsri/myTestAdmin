<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Business Basic Details'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Business Basic Detail'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessTypes index large-9 medium-8 columns content">
    <h3><?= __('Business Types') ?></h3>
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
            <?php foreach ($businessTypes as $businessType): ?>
            <tr>
                <td><?= $this->Number->format($businessType->id) ?></td>
                <td><?= h($businessType->name) ?></td>
                <td><?= h($businessType->label) ?></td>
                <td><?= h($businessType->status) ?></td>
                <td><?= h($businessType->is_deleted) ?></td>
                <td><?= $this->Number->format($businessType->last_modified_by) ?></td>
                <td><?= h($businessType->created) ?></td>
                <td><?= h($businessType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessType->id)]) ?>
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
