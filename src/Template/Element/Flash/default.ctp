<?php
$class = 'alert alert-info  alert-dismissible mt-1 mb-1';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-middle fa-times-circle"></i></span></button>
<i class="fa fa-2x fa-middle fa-info-circle"></i> <?= $message ?>
</div>

