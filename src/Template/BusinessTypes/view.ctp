<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business Type'), ['action' => 'edit', $businessType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business Type'), ['action' => 'delete', $businessType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Business Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Business Basic Details'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Business Basic Detail'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessTypes view large-9 medium-8 columns content">
    <h3><?= h($businessType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($businessType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($businessType->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($businessType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Modified By') ?></th>
            <td><?= $this->Number->format($businessType->last_modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= h($businessType->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($businessType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($businessType->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $businessType->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Business Basic Details') ?></h4>
        <?php if (!empty($businessType->user_business_basic_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Business Type Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Legal Entity Name') ?></th>
                <th scope="col"><?= __('Pan Number') ?></th>
                <th scope="col"><?= __('Adhaar Number') ?></th>
                <th scope="col"><?= __('Business Category Id') ?></th>
                <th scope="col"><?= __('Website Url') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Is Pan Uploaded') ?></th>
                <th scope="col"><?= __('Is Adhaar Uploaded') ?></th>
                <th scope="col"><?= __('Is Approved') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Remark') ?></th>
                <th scope="col"><?= __('Approved By') ?></th>
                <th scope="col"><?= __('Last Modified By') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($businessType->user_business_basic_details as $userBusinessBasicDetails): ?>
            <tr>
                <td><?= h($userBusinessBasicDetails->id) ?></td>
                <td><?= h($userBusinessBasicDetails->business_type_id) ?></td>
                <td><?= h($userBusinessBasicDetails->user_id) ?></td>
                <td><?= h($userBusinessBasicDetails->legal_entity_name) ?></td>
                <td><?= h($userBusinessBasicDetails->pan_number) ?></td>
                <td><?= h($userBusinessBasicDetails->adhaar_number) ?></td>
                <td><?= h($userBusinessBasicDetails->business_category_id) ?></td>
                <td><?= h($userBusinessBasicDetails->website_url) ?></td>
                <td><?= h($userBusinessBasicDetails->status) ?></td>
                <td><?= h($userBusinessBasicDetails->is_pan_uploaded) ?></td>
                <td><?= h($userBusinessBasicDetails->is_adhaar_uploaded) ?></td>
                <td><?= h($userBusinessBasicDetails->is_approved) ?></td>
                <td><?= h($userBusinessBasicDetails->is_deleted) ?></td>
                <td><?= h($userBusinessBasicDetails->remark) ?></td>
                <td><?= h($userBusinessBasicDetails->approved_by) ?></td>
                <td><?= h($userBusinessBasicDetails->last_modified_by) ?></td>
                <td><?= h($userBusinessBasicDetails->created) ?></td>
                <td><?= h($userBusinessBasicDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'view', $userBusinessBasicDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'edit', $userBusinessBasicDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserBusinessBasicDetails', 'action' => 'delete', $userBusinessBasicDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userBusinessBasicDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
