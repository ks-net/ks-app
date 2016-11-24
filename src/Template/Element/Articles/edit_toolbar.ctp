<div class="card card-outline-secondary">    
    <?= $this->Form->button($this->Html->tag('span', '', array('class' => 'fa fa-refresh fa-lg')).  __('&nbsp;Save'), 
                array('escape'=>false,'class' => 'btn btn-sm btn-success ml-1 my-1','formnovalidate' => true)    
    ) ?>
    <?= $this->Form->button($this->Html->tag('span', '', array('class' => 'fa fa-check-square-o fa-lg')).  __('&nbsp;Save&close'), 
                array('escape'=>false,'class' => 'btn btn-sm btn-outline-success ml-1 my-1','formnovalidate' => true)    
    ) ?>
    <?= $this->Form->button($this->Html->tag('span', '', array('class' => 'fa fa-plus-square fa-lg')).  __('&nbsp;Save+New'), 
                array('escape'=>false,'class' => 'btn btn-sm btn-info ml-1 my-1','formnovalidate' => true)    
    ) ?>
    <?= $this->Html->link($this->Html->tag('span', '', array('class' => 'fa fa-window-close fa-lg')).  __('&nbsp;Cancel-Exit'),
                array('action' => 'index'), 
                array('escape'=>false,'class' => 'btn btn-sm btn-warning ml-1 my-1')    
    ) ?>

    
    
    <?= $this->Form->postLink($this->Html->tag('span', '', array('class' => 'fa fa-trash fa-lg')). __('&nbsp;Delete'),
                array('action' => 'delete', $article->id),array('escape'=>false,
                    'data-toggle'=>'tooltip',
                    'data-placement'=>'bottom',
                    'data-html'=>'true',
                    'block' => 'toolbar',
                    'secure' => true,
                    'title'=>__('Are you sure you want to delete # {0}? <br/><b>action is not recoverable</b>', $article->id),                        
                    'class' => 'btn btn-sm btn-danger ml-1 my-1',
                    'confirm' =>__('Are you sure you want to delete # {0}?', $article->id))
    ) ?>      
    
    
    
    
  </div>

