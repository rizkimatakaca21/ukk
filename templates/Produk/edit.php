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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produkEntity->ProdukID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->ProdukID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk form content">
            <?= $this->Form->create($produkEntity) ?>
            <fieldset>
                <legend><?= __('Edit Produk') ?></legend>
                <?php
                    echo $this->Form->control('NamaProduk');
                    echo $this->Form->control('Harga');
                    echo $this->Form->control('Stok');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
