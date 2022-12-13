<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['controller' => 'Galleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['controller' => 'Galleries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $category->has('product') ? $this->Html->link($category->product->name, ['controller' => 'Products', 'action' => 'view', $category->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($category->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($category->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Galleries') ?></h4>
        <?php if (!empty($category->galleries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Material Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->galleries as $galleries): ?>
            <tr>
                <td><?= h($galleries->id) ?></td>
                <td><?= h($galleries->project_id) ?></td>
                <td><?= h($galleries->material_id) ?></td>
                <td><?= h($galleries->category_id) ?></td>
                <td><?= h($galleries->image) ?></td>
                <td><?= h($galleries->status) ?></td>
                <td><?= h($galleries->created) ?></td>
                <td><?= h($galleries->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Galleries', 'action' => 'view', $galleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Galleries', 'action' => 'edit', $galleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Galleries', 'action' => 'delete', $galleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
