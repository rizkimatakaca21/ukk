<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Penjualan> $penjualan
 */
?>
<div class="penjualan index content">
    <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Penjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('PenjualanID') ?></th>
                    <th><?= $this->Paginator->sort('TanggalPenjualan') ?></th>
                    <th><?= $this->Paginator->sort('TotalHarga') ?></th>
                    <th><?= $this->Paginator->sort('PelangganID') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $penjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($penjualanEntity->PenjualanID) ?></td>
                    <td><?= h($penjualanEntity->TanggalPenjualan) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->TotalHarga) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->PelangganID) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $penjualanEntity->PenjualanID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $penjualanEntity->PenjualanID]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $penjualanEntity->PenjualanID],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->PenjualanID),
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