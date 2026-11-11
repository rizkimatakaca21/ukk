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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detailpenjualanEntity->DetailID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->DetailID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detailpenjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailpenjualan form content">
            <?= $this->Form->create($detailpenjualanEntity) ?>
            <fieldset>
                <legend><?= __('Edit Detailpenjualan') ?></legend>
                <?php
                    echo $this->Form->control('PenjualanID');
                    echo $this->Form->control('ProdukID');
                    echo $this->Form->control('JumlahProduk');
                    echo $this->Form->control('SubTotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
