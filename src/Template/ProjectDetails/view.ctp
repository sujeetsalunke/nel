<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectDetail $projectDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Detail'), ['action' => 'edit', $projectDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Detail'), ['action' => 'delete', $projectDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectDetails view large-9 medium-8 columns content">
    <h3><?= h($projectDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($projectDetail->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($projectDetail->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($projectDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($projectDetail->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text Details') ?></h4>
        <?= $this->Text->autoParagraph(h($projectDetail->text_details)); ?>
    </div>
</div>
