<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\City $city
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Share Celebrations'), ['controller' => 'ShareCelebrations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Share Celebration'), ['controller' => 'ShareCelebrations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($city->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($city->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($city->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Share Celebrations') ?></h4>
        <?php if (!empty($city->share_celebrations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Caption') ?></th>
                <th scope="col"><?= __('Winner Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->share_celebrations as $shareCelebrations): ?>
            <tr>
                <td><?= h($shareCelebrations->id) ?></td>
                <td><?= h($shareCelebrations->name) ?></td>
                <td><?= h($shareCelebrations->email) ?></td>
                <td><?= h($shareCelebrations->city_id) ?></td>
                <td><?= h($shareCelebrations->image) ?></td>
                <td><?= h($shareCelebrations->caption) ?></td>
                <td><?= h($shareCelebrations->winner_id) ?></td>
                <td><?= h($shareCelebrations->created) ?></td>
                <td><?= h($shareCelebrations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ShareCelebrations', 'action' => 'view', $shareCelebrations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ShareCelebrations', 'action' => 'edit', $shareCelebrations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShareCelebrations', 'action' => 'delete', $shareCelebrations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shareCelebrations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
