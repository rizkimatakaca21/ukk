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
            <?= $this->Html->link(__('List User'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="user form content">
            <?= $this->Form->create($userEntity) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('nama');
                    echo $this->Form->control('role', [
                    'type' => 'select',
                    'options' => [
                    'administrator' => 'Administrator',
                    'petugas' => 'Petugas',
                    ],]); 
                    echo $this->Form->control('username'); // ADDED
                    echo $this->Form->control('password'); // ADDED
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>