<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Detailpenjualan> $detailpenjualan
 */
?>
<div class="detailpenjualan index content">
    <?= $this->Html->link(__('New Detailpenjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detailpenjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('DetailID') ?></th>
                    <th><?= $this->Paginator->sort('PenjualanID') ?></th>
                    <th><?= $this->Paginator->sort('ProdukID') ?></th>
                    <th><?= $this->Paginator->sort('JumlahProduk') ?></th>
                    <th><?= $this->Paginator->sort('SubTotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailpenjualan as $detailpenjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($detailpenjualanEntity->DetailID) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->PenjualanID) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->ProdukID) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->JumlahProduk) ?></td>
                    <td><?= $this->Number->format($detailpenjualanEntity->SubTotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailpenjualanEntity->DetailID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailpenjualanEntity->DetailID]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $detailpenjualanEntity->DetailID],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $detailpenjualanEntity->DetailID),
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