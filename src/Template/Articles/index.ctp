<div class="container-fluid">
    <div class="well">
        <h2 class="text-primary mt-2"><i class="fa fa-file-text"></i> <?= __('Articles') ?></h2>
    </div>
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
                        <th scope="col">
                            <?= $this->Paginator->sort('id') ?>
                        </th>
                        <th class="hidden-xs-down" scope="col">
                            <?= $this->Paginator->sort(__('title')) ?>
                        </th>
                        <th scope="col">
                            <?= $this->Paginator->sort(__('published')) ?>
                        </th>
                        <th class="hidden-sm-down" scope="col">
                            <?= $this->Paginator->sort(__('created')) ?>
                        </th>
                        <th class="hidden-sm-down" scope="col">
                            <?= $this->Paginator->sort(__('modified')) ?>
                        </th>
                        <th scope="col" class="actions">
                            <?= __('Actions') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($articles as $article):

                        $ttitle = $this->Text->truncate($article->title, 48, array(
                            'ellipsis' => '...',
                            'exact' => false,
                            'html' => false
                                )
                        );
                        ?>

                        <tr>
                            <td>
                                <?= $this->Number->format($article->id) ?>
                            </td>
                            <td>
                                <?php
                                if ($article->published == 1) {
                                    echo h($ttitle);
                                } else {
                                    echo '<span class="inactive">' . h($ttitle) . '</span>';
                                }
                                ?>
                            <td class="hidden-xs-down">
                                <?php
                                if ($article->published == 1) {
                                    echo '<i class="fa fa-check-circle"></i>';
                                } else {
                                    echo '<i class="fa fa-stop-circle-o inactive"></i>';
                                }
                                ?>
                            </td>
                            <td class="hidden-sm-down">
                                <small>
                                    <?= h($article->created) ?>
                                </small>
                            </td>
                            <td class="hidden-sm-down">
                                <small>
                                    <?= h($article->modified) ?>
                                </small>
                            </td>
                            <td class="actions">
                                <?=
                                $this->Html->link(
                                        $this->Html->tag(
                                                'span', '', [
                                            'class' => 'fa fa-eye fa-mr-3px'
                                        ]) . __('View'), [
                                    'action' => 'view', $article->id
                                        ], [
                                    'escape' => false, 'class' => 'tag tag-info'
                                        ]
                                )
                                ?>

                                <?=
                                $this->Html->link(
                                        $this->Html->tag(
                                                'span', '', array(
                                            'class' => 'fa fa-pencil fa-mr-3px'
                                        )) . __('Edit'), array(
                                    'action' => 'edit', $article->id
                                        ), array(
                                    'escape' => false, 'class' => 'tag tag-success'
                                        )
                                )
                                ?>

                                <?=
                                $this->Form->postLink(
                                        $this->Html->tag(
                                                'span', '', [
                                            'class' => 'fa fa-remove fa-mr-3px'
                                        ]) . __('Delete'), [
                                    'action' => 'delete', $article->id
                                        ], [
                                    'escape' => false,
                                    'data-toggle' => 'tooltip',
                                    'data-html' => 'true',
                                    'data-placement' => 'top',
                                    'title' => __('Are you sure you want to delete # {0}? <br/><b>action is not recoverable</b>', $article->id),
                                    'class' => 'tag tag-danger',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $article->id)
                                        ]
                                )
                                ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="paginator">
                <ul class="pagination">
                    <?=
                    $this->Paginator->first(
                            '<i class="fa fa-fast-backward" aria-hidden="true"></i>', ['escape' => false]
                    )
                    ?>

                    <?=
                    $this->Paginator->prev(
                            '<i class="fa fa-backward" aria-hidden="true"></i>', ['escape' => false]
                    )
                    ?>

                    <?=
                    $this->Paginator->numbers(
                            ['modulus' => 4, 'first' => 4, 'last' => 3,]
                    )
                    ?>

                    <?=
                    $this->Paginator->next(
                            '<i class="fa fa-forward" aria-hidden="true"></i>', ['escape' => false]
                    )
                    ?>

                    <?=
                    $this->Paginator->last(
                            '<i class="fa fa-fast-forward" aria-hidden="true"></i>', ['escape' => false]
                    )
                    ?>

                </ul>
                <div class="row">
                    <div class="d-inline-block">
                        <?= __('Listing posts') . ': ' ?>
                        <span class="tag tag-default">
                            <?= $this->Paginator->counter(['format' => 'range']) ?>
                        </span>
                    </div>
                    <div class="d-inline-block">
                        <?= __('Page') . ': ' ?>
                        <span class="tag tag-default">
                            <?= $this->Paginator->counter(['format' => 'pages']) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>