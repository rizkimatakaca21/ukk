<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $userEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userEntity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="user form content">
            <?= $this->Form->create($userEntity) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('nama');
                    echo $this->Form->control('role', [
                    'type' => 'select',
                    'options' => [
                    'administrator' => 'Administrator',
                    'petugas' => 'Petugas',
                    ],]); 
                    echo $this->Form->control('username'); // ADDED
                    echo $this->Form->control('password', ['value' => '', 'required' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>