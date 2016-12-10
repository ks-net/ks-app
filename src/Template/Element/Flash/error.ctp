<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-danger alert-dismissible" onclick="this.classList.add('hidden');" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<i class="fa fa-exclamation-triangle fa-2x fa-middle "></i> <?= $message ?>
</div>

