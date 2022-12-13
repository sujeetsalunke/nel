<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AboutU $aboutU
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit About U'), ['action' => 'edit', $aboutU->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete About U'), ['action' => 'delete', $aboutU->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aboutU->id)]) ?> </li>
        <li><?= $this->Html->link(__('List About Us'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New About U'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aboutUs view large-9 medium-8 columns content">
    <h3><?= h($aboutU->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($aboutU->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image 1') ?></th>
            <td><?= h($aboutU->image_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image 2') ?></th>
            <td><?= h($aboutU->image_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aboutU->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($aboutU->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aboutU->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aboutU->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description 1') ?></h4>
        <?= $this->Text->autoParagraph(h($aboutU->description_1)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description 2') ?></h4>
        <?= $this->Text->autoParagraph(h($aboutU->description_2)); ?>
    </div>
</div>
