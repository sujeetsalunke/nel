<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CmsPage $cmsPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cms Page'), ['action' => 'edit', $cmsPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cms Page'), ['action' => 'delete', $cmsPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cmsPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cms Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cms Page'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cmsPages view large-9 medium-8 columns content">
    <h3><?= h($cmsPage->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($cmsPage->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Name') ?></th>
            <td><?= h($cmsPage->display_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Title') ?></th>
            <td><?= h($cmsPage->meta_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Keyword') ?></th>
            <td><?= h($cmsPage->meta_keyword) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cmsPage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($cmsPage->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cmsPage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cmsPage->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cmsPage->meta_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cmsPage->description)); ?>
    </div>
</div>
