<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 * @var array $produkList
 * @var array $hargaMap
 */

// Satu baris produk. $i berisi nomor baris (atau placeholder __INDEX__ untuk template).
$barisProduk = function ($i) use ($produkList) {
    ob_start(); ?>
    <div class="baris-produk" style="display:flex; gap:1rem; align-items:flex-end;">
        <?= $this->Form->control("detailpenjualan.$i.ProdukID", [
            'label' => 'Produk',
            'type' => 'select',
            'options' => $produkList,
            'empty' => '-- pilih produk --',
            'required' => false,
            'class' => 'js-produk',
        ]) ?>
        <?= $this->Form->control("detailpenjualan.$i.Harga", [
            'label' => 'Harga',
            'type' => 'number',
            'readonly' => true,
            'required' => false,
            'class' => 'js-harga',
        ]) ?>
        <?= $this->Form->control("detailpenjualan.$i.JumlahProduk", [
            'label' => 'Jumlah',
            'type' => 'number',
            'min' => 1,
            'required' => false,
            'class' => 'js-jumlah',
        ]) ?>
        <div class="input">
            <button type="button" class="button button-outline js-hapus">Hapus</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
};
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
                    echo $this->Form->control('PelangganID');
                ?>
            </fieldset>

            <fieldset>
                <div id="daftar-produk">
                    <?= $barisProduk(0) ?>
                </div>

                <button type="button" id="tambah-produk" class="button button-outline">+ Tambah Produk</button>
                <br><br>
                <strong>Total: Rp <span id="total">0</span></strong>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- Template baris baru (tidak ikut terkirim) -->
<template id="template-baris">
    <?= $barisProduk('__INDEX__') ?>
</template>

<script>
const hargaMap = <?= json_encode($hargaMap) ?>;
const daftar = document.getElementById('daftar-produk');
let nextIndex = 1; // baris pertama memakai index 0

function hitung() {
    let total = 0;
    daftar.querySelectorAll('.baris-produk').forEach(row => {
        const produkId = row.querySelector('.js-produk').value;
        const harga = hargaMap[produkId] || 0;
        const jumlah = parseInt(row.querySelector('.js-jumlah').value) || 0;

        row.querySelector('.js-harga').value = produkId ? harga : '';
        total += harga * jumlah;
    });
    document.getElementById('total').textContent = total.toLocaleString('id-ID');
}

function aturTombolHapus() {
    const baris = daftar.querySelectorAll('.baris-produk');
    baris.forEach(row => {
        row.querySelector('.js-hapus').style.display = baris.length > 1 ? '' : 'none';
    });
}

// Tambah baris
document.getElementById('tambah-produk').addEventListener('click', () => {
    const html = document.getElementById('template-baris').innerHTML
        .replaceAll('__INDEX__', nextIndex++);
    daftar.insertAdjacentHTML('beforeend', html);
    aturTombolHapus();
});

// Hapus baris (event delegation)
daftar.addEventListener('click', e => {
    if (e.target.classList.contains('js-hapus')) {
        e.target.closest('.baris-produk').remove();
        aturTombolHapus();
        hitung();
    }
});

// Hitung ulang saat produk / jumlah berubah (berlaku juga untuk baris baru)
daftar.addEventListener('change', hitung);
daftar.addEventListener('input', hitung);

aturTombolHapus();
hitung();
</script>