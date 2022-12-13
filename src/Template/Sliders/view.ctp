<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sliders view large-9 medium-8 columns content">
    <h3><?= h($slider->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($slider->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($slider->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($slider->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($slider->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($slider->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($slider->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($slider->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text Slider') ?></h4>
        <?= $this->Text->autoParagraph(h($slider->text_slider)); ?>
    </div>
</div>
