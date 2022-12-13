<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductColorImage $productColorImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Color Image'), ['action' => 'edit', $productColorImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Color Image'), ['action' => 'delete', $productColorImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productColorImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Color Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Color Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productColorImages view large-9 medium-8 columns content">
    <h3><?= h($productColorImage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project Detail') ?></th>
            <td><?= $productColorImage->has('project_detail') ? $this->Html->link($productColorImage->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $productColorImage->project_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productColorImage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($productColorImage->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productColorImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($productColorImage->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productColorImage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productColorImage->modified) ?></td>
        </tr>
    </table>
</div>
