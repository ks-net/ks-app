<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Media'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="container-fluid clearfix">
<div class="card">
  <!-- Default panel contents -->
<div class="card card-header bg-primary text-white">
<?= __('Media Listing Table') ?>
</div>
<div class="article-list-table table-responsive ">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($media as $media): ?>
            <tr>
                <td><?= $this->Number->format($media->id) ?></td>
                <td><?= h($media->filename) ?></td>
                <td><?= h($media->title) ?></td>
                <td><?= h($media->created) ?></td>
                <td><?= h($media->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="card-footer">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<i class="fa fa-fast-backward" aria-hidden="true"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fa fa-backward" aria-hidden="true"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers(['modulus' => 4,'first' => 4,'last' => 3,] ) ?>
            <?= $this->Paginator->next('<i class="fa fa-forward" aria-hidden="true"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fa fa-fast-forward" aria-hidden="true"></i>', ['escape' => false]) ?>
        </ul>
        <div class="row">
        <div class="d-inline-block">
        <?= __('Listing posts').': ' ?>
        <span class="tag tag-default"><?= $this->Paginator->counter(['format' => 'range']) ?></span>
        </div>
        <div class="d-inline-block">
        <?= __('Page').': ' ?>
        <span class="tag tag-default"><?= $this->Paginator->counter(['format' => 'pages']) ?></span>
        </div>
        </div>
    </div>
</div>
</div>
</div>
