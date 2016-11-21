<div class="container-fluid clearfix">
<nav class="navbar navbar-default" id="actions-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item disabled"><a class="nav-link disabled" href="#"><?= __('Actions') ?></a></li>
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
</div>
<div class="container clearfix">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Library</a></li>
  <li class="breadcrumb-item active">Data</li>
</ol>
</div>

<div class="container article-page clearfix">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Intro Image') ?></th>
            <td> <?= h($article->img) ?></td>
        </tr>        
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    
<div class="article-content">
    <div class="article-title">     
    <h4><?= __('Body') ?></h4>
    </div>    
    <div class="article-intro-img">        
              <?= $this->Html->image('article-images/'.$article->img, array(
              'alt' => h($article->title),
              'class' => 'pull-left float-xs-left img-fluid img-thumbnail rounded mr-2 mb-1')
               ) ?>      
    </div>           
    <div class="article-text">
        <?= //$this->Text->autoParagraph($article->body); 
        ($article->body)
        ?> 
    </div>    
</div>
    
<?= $article->pre ?> <?= $article->next ?>
    
</div>
