<?php
/**
 * @var \App\View\AppView $this
 * @var object $block
 * @var mixed $helper
 * @var mixed $menuItems
 * @var mixed $options
 */
?>
<?php if ($block->title) : ?>
    <h4 class="block-title"><?= $block->title ?></h4>
<?php endif; ?>
<?= $this->{$helper}->render($menuItems, $options); ?>