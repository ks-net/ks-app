<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $media->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Media'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="media form large-9 medium-8 columns content">
    <?= $this->Form->create($media) ?>
    <fieldset>
        <legend><?= __('Edit Media') ?></legend>
        <?php
            echo $this->Form->input('filename');
            echo $this->Form->input('title');
            echo $this->Form->input('desccription');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
