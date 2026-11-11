<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Penjualan'), ['action' => 'edit', $penjualanEntity->PenjualanID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Penjualan'), ['action' => 'delete', $penjualanEntity->PenjualanID], ['confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->PenjualanID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan view content">
            <h3><?= h($penjualanEntity->PenjualanID) ?></h3>
            <table>
                <tr>
                    <th><?= __('PenjualanID') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->PenjualanID) ?></td>
                </tr>
                <tr>
                    <th><?= __('TotalHarga') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->TotalHarga) ?></td>
                </tr>
                <tr>
                    <th><?= __('PelangganID') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->PelangganID) ?></td>
                </tr>
                <tr>
                    <th><?= __('TanggalPenjualan') ?></th>
                    <td><?= h($penjualanEntity->TanggalPenjualan) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>