<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pelanggan $pelangganEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pelanggan'), ['action' => 'edit', $pelangganEntity->PelangganID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pelanggan'), ['action' => 'delete', $pelangganEntity->PelangganID], ['confirm' => __('Are you sure you want to delete # {0}?', $pelangganEntity->PelangganID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pelanggan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pelanggan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pelanggan view content">
            <h3><?= h($pelangganEntity->NamaPelanggan) ?></h3>
            <table>
                <tr>
                    <th><?= __('NamaPelanggan') ?></th>
                    <td><?= h($pelangganEntity->NamaPelanggan) ?></td>
                </tr>
                <tr>
                    <th><?= __('NomorTelp') ?></th>
                    <td><?= h($pelangganEntity->NomorTelp) ?></td>
                </tr>
                <tr>
                    <th><?= __('PelangganID') ?></th>
                    <td><?= $this->Number->format($pelangganEntity->PelangganID) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Alamat') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pelangganEntity->Alamat)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>