<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produk $produkEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produk'), ['action' => 'edit', $produkEntity->ProdukID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produk'), ['action' => 'delete', $produkEntity->ProdukID], ['confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->ProdukID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk view content">
            <h3><?= h($produkEntity->NamaProduk) ?></h3>
            <table>
                <tr>
                    <th><?= __('NamaProduk') ?></th>
                    <td><?= h($produkEntity->NamaProduk) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProdukID') ?></th>
                    <td><?= $this->Number->format($produkEntity->ProdukID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Harga') ?></th>
                    <td><?= $this->Number->format($produkEntity->Harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stok') ?></th>
                    <td><?= $this->Number->format($produkEntity->Stok) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>