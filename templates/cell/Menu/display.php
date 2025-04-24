<?php if ($block->title): ?>
    <h4 class="block-title"><?= $block->title ?></h4>
<?php endif; ?>
<?= $this->{$helper}->render($menuItems, $options); ?>