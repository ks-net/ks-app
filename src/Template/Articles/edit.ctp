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
<?= $this->Form->create($article, array('type' => 'file')) ?>
    <fieldset>
        <legend class="text-primary"><?= __('Edit Article') ?></legend>
        <div class="form-group">
        <?= $this->Form->label('title', ' <span class="fa fa-question-circle-o"></span> '.__('Article Title'), array(
        'class' => 'help',
        'data-toggle'=>'tooltip',
        'data-html'=>'true',
        'data-placement'=>'right',
        'title'=> __('Add no more than 200 chars'),
        'escape' => false
        )) ?>
        <div class="input-group">
        <div class="input-group-addon"><span class="fa fa-hand-o-right"></span></div>
        <?php   echo $this->Form->input('title', array(
        'type'=>'text',
        'class' => 'form-control',
        'label' =>  false
        )); 
        ?>
        </div>
        </div>
        
        <hr/>
        <div class="form-group">
        <?php   echo $this->Form->input('img', array(
        'type'=>'file',
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
        <span class="fa fa-question-circle help" data-toggle="tooltip" data-html="true" data-placement="right" title="<?= __('Current Intro Image for this post saved in database') ?>"></span> <span class=""> <?= __('Current Intro Image')?></span>     
        </div>     
        <hr/>    
                       
        <div class="form-group">
        <?=  $this->Form->input('body', array(
        'type'=>'textarea',
        'class' => 'form-control','rows' => '14',
        'label' => __('Article Body'),
        )) 
        ?>
        </div>  
    </fieldset>    
  <div class="form-group">    
    <?= $this->Form->button($this->Html->tag('span', '', array('class' => 'fa fa-check-square-o fa-lg')).  __('&nbsp;Save'), 
                array('escape'=>false,'class' => 'btn btn-lg btn-success')    
    ) ?>      
  </div><!-- end article edit form -->   
<?= $this->Form->end() ?>
</div>     
        