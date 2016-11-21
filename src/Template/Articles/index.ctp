<div class="container-fluid clearfix">
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
    <li class="nav-item"><a href="#" class="nav-link disabled"><span class="fa fa-sign-out fa-lg"></span></a></li>
        <li class="nav-item">
        <?= $this->Html->link(
                $this->Html->tag('span ', '', array('class' => 'fa fa-plus-circle fa-lg')).__('&nbsp;New Article'),
                array('action' => 'add'),
                array('escape'=>false,'class' => 'nav-link')
                ) ?>
                </li>
        <li class="nav-item">
        <?= $this->Html->link(
                $this->Html->tag('span', '', array('class' => 'fa fa-list fa-lg')).__(' List Articles'),
                array('action' => 'index'), 
                array('escape'=>false,'class' => 'nav-link active')
        ) ?>
        </li>
    </ul>
</nav>
</div>
<div class="container-fluid clearfix">
<div class="card">
  <!-- Default panel contents -->
<div class="card card-header bg-primary text-white">
<?= __('Articles Listing Table') ?>
</div>
<div class="article-list-table table-responsive ">    
    <table class="table table-bordered table-sm table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr class="table-default table-active">
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td><?= h($article->modified) ?></td>
                <td class="actions">
                <?= $this->Html->link(
                $this->Html->tag('span','', array('class' => 'fa fa-eye')).__('&nbsp;View'),
                array('action' => 'view', $article->id),
                array('escape'=>false,'class' => 'tag tag-info')
                ) ?>
                <?= $this->Html->link(
                $this->Html->tag('span','', array('class' => 'fa fa-pencil')).__('&nbsp;Edit'),
                array('action' => 'edit', $article->id),
                array('escape'=>false,'class' => 'tag tag-success')
                ) ?>
                <?= $this->Form->postLink(
                $this->Html->tag('span','', array('class' => 'fa fa-remove')).__('&nbsp;Delete'),
                array('action' => 'delete', $article->id),
                array('escape'=>false,
                'data-toggle'=>'tooltip',
                'data-html'=>'true',
                'data-placement'=>'top',
                'title'=>__('Are you sure you want to delete # {0}? <br/><b>action is not recoverable</b>',  $article->id),
                'class' => 'tag tag-danger',
                'confirm' => __('Are you sure you want to delete # {0}?', $article->id))
                ) ?>
        </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="card-footer">
    <div class="paginator">
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first( __('First')) ?>
            <?= $this->Paginator->prev('«') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('»') ?>
            <?= $this->Paginator->last(__('Last')) ?>
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