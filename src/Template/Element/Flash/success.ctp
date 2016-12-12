<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-success alert-dismissible mt-1 mb-1" onclick="this.classList.add('hidden')" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-middle fa-times-circle"></i></span></button>
<i class="fa fa-check-square fa-2x fa-middle"></i> <?= $message ?>
</div>

