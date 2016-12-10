<?php echo $this->assign('title', 'Edit Article'); ?>

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
                <?= $this->Form->postLink(
                        $this->Html->tag('span', '', array('class' => 'fa fa-trash fa-lg')). __('&nbsp;Delete'),
                        array('action' => 'delete', $article->id),array(
                        'escape'=>false,
                        'data-toggle'=>'tooltip',
                        'data-placement'=>'bottom',
                        'data-html'=>'true',
                        'title'=>__('Are you sure you want to delete # {0}? <br/><b>action is not recoverable</b>', $article->id),
                        'class' => 'nav-link',
                        'confirm' =>__('Are you sure you want to delete # {0}?', $article->id))
                )
                ?>
        </li>
        <li class="nav-item">
        <?= $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'fa fa-list fa-lg')).__(' List Articles'),
                        array('action' => 'index'),
                        array('escape'=>false,'class' => 'nav-link')
                ) ?>
        </li>
    </ul>
</nav>
<!-- start article edit form -->
<br/>




<?php echo $this->start('toolbar');
echo $this->element('Articles/edit_toolbar');
$this->end();
?>



<?= $this->Form->create($article, array('type' => 'file', 'class' => 'form')) ?>
    <fieldset>



    <legend class="text-primary"><?= __('Edit Article') ?></legend>

<?= $this->fetch('toolbar') ?>


    <hr/>
    <div class="form-group">
        <?=
        $this->Form->label(
                'title', ' <span class="fa fa-question-circle-o"></span> ' . __('Article Title'), array(
            'class' => 'form-control-label',
            'data-toggle' => 'tooltip',
            'data-html' => 'true',
            'data-placement' => 'right',
            'title' => __('Add no more than 200 chars'),
            'escape' => false
                )
        )
        ?>
        <div class="input-group">
            <div class="input-group-addon"><span class="fa fa-hand-o-right"></span></div>
            <?=
            $this->Form->input(
                    'title', array(
                'type' => 'text',
                'class' => 'form-control',
                'label' => false
                    )
            )
            ?>
        </div>
  </div>
    <div class="form-group">

        <?=
        $this->Form->label(
                'title', ' <span class="fa fa-question-circle-o"></span> ' . __('Published'), array(
            'class' => 'form-control-label',
            'data-toggle' => 'tooltip',
            'data-html' => 'true',
            'data-placement' => 'right',
            'title' => __('Check this box to Publish the Article'),
            'escape' => false
                )
        )
        ?>

            <?=
            $this->Form->checkbox(
                    'published', array(
                'type' => 'checkbox',
                'class' => '',
                'label' => false
                    )
            )
            ?>


    </div>

    <hr/>
    <div class="form-group">
        <?php
        echo $this->Form->input('img', array(
            'type' => 'file',
            'label' => __('New Intro Image'),
            'class' => 'form-control-file btn btn-file',
        ));
        ?>
    </div>

        <div class="row-fluid clearfix">
        <?= $this->Html->link($this->Html->image('article-images/'.$article->img, array(
              'alt' =>  __('Current Intro Image'),
              'class' => 'img-thumbnail rounded',
              'width'=>'110px')),
              'img/article-images/'.$article->img, array(
              'class' => 'fancybox hasoverlay',
              //'data-toggle'=>'tooltip',
              //'data-html'=>'true',
              //'data-placement'=>'right',
              'title' => __('Current Intro Image saved in database'),
              'escape' => false
         )) ?>
        <span class="fa fa-question-circle help" data-toggle="tooltip" data-html="true" data-placement="right" title="<?= __('Current Intro Image for this post saved in database') ?>"></span>
        <span class=""> <?= __('Current Intro Image')?></span>
        </div>

        <hr/>

        <div class="form-group">
        <?=  $this->Form->input('body', array(
        'type'=>'textarea',
        'class' => 'form-control','rows' => '14',
        'label' => __('Article Body'),
        'div' => 'false',
        ))
        ?>
        </div>
    </fieldset>
<!-- end article edit form -->
<?= $this->Form->end() ?>
</div>

<?php echo $this->start('scriptBottom');?>
<?=  $this->Html->script('ckeditor/ckeditor.js') ?>
<script> CKEDITOR.replace( 'body', { customConfig: 'MyConfig/Myconfig.js' } ); </script>
<?php $this->end(); ?>
