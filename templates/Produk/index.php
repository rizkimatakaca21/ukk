<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Produk> $produk
 */
?>
<div class="produk index content">
    <?= $this->Html->link(__('New Produk'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produk') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ProdukID') ?></th>
                    <th><?= $this->Paginator->sort('NamaProduk') ?></th>
                    <th><?= $this->Paginator->sort('Harga') ?></th>
                    <th><?= $this->Paginator->sort('Stok') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $produkEntity): ?>
                <tr>
                    <td><?= $this->Number->format($produkEntity->ProdukID) ?></td>
                    <td><?= h($produkEntity->NamaProduk) ?></td>
                    <td><?= $this->Number->format($produkEntity->Harga) ?></td>
                    <td><?= $this->Number->format($produkEntity->Stok) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $produkEntity->ProdukID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produkEntity->ProdukID]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $produkEntity->ProdukID],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->ProdukID),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>