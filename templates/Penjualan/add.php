<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 * @var array $produkList
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan form content">
            <?= $this->Form->create($penjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Penjualan') ?></legend>
                <?php
                    echo $this->Form->control('TanggalPenjualan');
                    // CHANGED: TotalHarga dihitung otomatis dari subtotal produk
                    echo $this->Form->control('PelangganID');
                ?>
            </fieldset>

            <!-- ADDED: baris produk, subtotal otomatis -->
            <fieldset>
                <legend><?= __('Produk') ?></legend>
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div style="display:flex; gap:1rem;">
                        <?= $this->Form->control("detailpenjualan.$i.ProdukID", [
                            'label' => 'Produk',
                            'type' => 'select',
                            'options' => $produkList,
                            'empty' => '-- pilih produk --',
                            'required' => false,
                        ]) ?>
                        <?= $this->Form->control("detailpenjualan.$i.JumlahProduk", [
                            'label' => 'Jumlah',
                            'type' => 'number',
                            'min' => 1,
                            'required' => false,
                        ]) ?>
                    </div>
                <?php endfor; ?>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>