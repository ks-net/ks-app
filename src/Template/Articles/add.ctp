<nav class="navbar navbar-default"  id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item disabled"><a class="nav-link disabled" href="#"><?= __('Actions') ?></a></li>
        <li class="nav-item">
        <?= $this->Html->link(
                        $this->Html->tag('span ', '', array('class' => 'glyphicon glyphicon-plus-sign')).__(' New Article'),
                        array('action' => 'add'),
                        array('escape'=>false,'class' => 'nav-link label label-warning')
                ) ?>
                </li>        <li class="nav-item">
        <?= $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-list')).__(' List Articles'),
                        array('action' => 'index'), 
                        array('escape'=>false,'class' => 'nav-link label label-info ')
                ) ?>
        </li>
    </ul>
</nav>
<!-- start article edit form -->
    <?= $this->Form->create($article, array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Add Article') ?></legend>
        <div class="form-group ">
        <?php   echo $this->Form->input('title', array(
        'class' => 'form-control',
        'label' => __('Article Title'),
        )); 
        ?>
        </div>
        <div class="form-group ">
        <?php   echo $this->Form->input('img', array(
        'type'=>'file',
        'label' => __('Intro Image'),
        'class' => 'btn btn-default btn-file'
        )); 
        ?>
        </div>
        
        <div class="form-group">
        <?php    echo $this->Form->input('body', array(
        'class' => 'form-control','rows' => '14',
        'label' => __('Article Body'),
        )); 
        ?>
        </div>  
  <div class="form-group">   
  
    <?= $this->Form->button($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-check')). __('Save'), 
                array('escape'=>false,'class' => 'btn btn-lg btn-success')   
    ) ?>   
    
    <?= $this->Form->end() ?>
</div>
<!-- end article edit form -->