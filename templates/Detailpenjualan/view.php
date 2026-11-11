<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailpenjualan $detailpenjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detailpenjualan'), ['action' => 'edit', $detailpenjualanEntity->DetailID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detailpenjualan'), ['action' => 'delete', $detailpenjualanEntity->DetailID], ['confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->DetailID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detailpenjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detailpenjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailpenjualan view content">
            <h3><?= h($detailpenjualanEntity->DetailID) ?></h3>
            <table>
                <tr>
                    <th><?= __('DetailID') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->DetailID) ?></td>
                </tr>
                <tr>
                    <th><?= __('PenjualanID') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->PenjualanID) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProdukID') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->ProdukID) ?></td>
                </tr>
                <tr>
                    <th><?= __('JumlahProduk') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->JumlahProduk) ?></td>
                </tr>
                <tr>
                    <th><?= __('SubTotal') ?></th>
                    <td><?= $this->Number->format($detailpenjualanEntity->SubTotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>