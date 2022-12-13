<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDetail $productDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Detail'), ['action' => 'edit', $productDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Detail'), ['action' => 'delete', $productDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Detail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productDetails view large-9 medium-8 columns content">
    <h3><?= h($productDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($productDetail->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Id') ?></th>
            <td><?= $this->Number->format($productDetail->product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($productDetail->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productDetail->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text Details') ?></h4>
        <?= $this->Text->autoParagraph(h($productDetail->text_details)); ?>
    </div>
</div>
