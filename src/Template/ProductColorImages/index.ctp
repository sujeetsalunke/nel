<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductColorImage[]|\Cake\Collection\CollectionInterface $productColorImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Color Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Project Details'), ['controller' => 'ProjectDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project Detail'), ['controller' => 'ProjectDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productColorImages index large-9 medium-8 columns content">
    <h3><?= __('Product Color Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_detail_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productColorImages as $productColorImage): ?>
            <tr>
                <td><?= $this->Number->format($productColorImage->id) ?></td>
                <td><?= $productColorImage->has('project_detail') ? $this->Html->link($productColorImage->project_detail->id, ['controller' => 'ProjectDetails', 'action' => 'view', $productColorImage->project_detail->id]) : '' ?></td>
                <td><?= h($productColorImage->name) ?></td>
                <td><?= h($productColorImage->image) ?></td>
                <td><?= $this->Number->format($productColorImage->status) ?></td>
                <td><?= h($productColorImage->created) ?></td>
                <td><?= h($productColorImage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productColorImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productColorImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productColorImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productColorImage->id)]) ?>
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
