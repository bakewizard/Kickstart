<?php
/**
 * @var \App\View\AppView $this
 * @var mixed $message
 */
?>
<?php $this->assign('title', h($message)); ?>

<div class="alert alert-warning" role="alert">
    <strong><?= h($message) ?></strong>
</div>
