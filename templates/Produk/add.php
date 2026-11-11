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
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk form content">
            <?= $this->Form->create($produkEntity) ?>
            <fieldset>
                <legend><?= __('Add Produk') ?></legend>
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
