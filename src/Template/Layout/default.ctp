<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?= $this->fetch('title') ?> | <?= $cakeDescription ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=greek') ?>
    <?= $this->Html->css('bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('fancybox/jquery.fancybox.css') ?>
    <?= $this->Html->css('ks-style.css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="container-fluid">
<div class="row clearfix">
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
</div>
</div>

<div class="row clearfix">
<div class="container">     
<div class=""><?= $this->Flash->render() ?></div>
</div>
</div>

<div class="main">
         
        <?= $this->fetch('content') ?>
        
</div>

   
<footer>
<div class="jumbotron clearfix">
<div class="container">  
          <h1 class="display-3">Hello, world!</h1>
          <p>Just a little demo here...</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Push Up Again  <span class="fa fa-level-up" aria-hidden="true"></span></a></p>
</div>       
</div>
</footer>

<?=  $this->Html->script('jquery-3.1.1.min.js') ?>
<?=  $this->Html->script('bootstrap/tether.min.js') ?>
<?=  $this->Html->script('bootstrap/bootstrap.min.js') ?>
<?=  $this->Html->script('fancybox/jquery.fancybox.pack.js') ?>
<?=  $this->Html->script('ks-app.js') ?> 
<?=  $this->Html->script('ckeditor/ckeditor.js') ?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
    CKEDITOR.replace( 'body', { customConfig: 'MyConfig/Myconfig.js' } );
</script>      
</body>
</html>