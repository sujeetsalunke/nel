<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Query $query
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Query'), ['action' => 'edit', $query->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Query'), ['action' => 'delete', $query->id], ['confirm' => __('Are you sure you want to delete # {0}?', $query->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Queries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Query'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="queries view large-9 medium-8 columns content">
    <h3><?= h($query->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($query->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($query->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($query->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($query->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($query->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($query->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($query->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Msg') ?></h4>
        <?= $this->Text->autoParagraph(h($query->msg)); ?>
    </div>
</div>
