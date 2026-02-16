<?php
/**
 * @var \App\View\AppView $this
 * @var object $meta
 */
?>
<?php if (isset($meta)) : ?>
    <?php $this->assign('title', $meta->seo_title); ?>
    <?= $this->Html->meta('description', $meta->seo_description, ['block' => true]); ?>
    <?= $this->Html->meta('keywords', $meta->seo_keywords, ['block' => true]); ?>
<?php endif; ?>
<?= $this->Html->script('home', ['block' => true]); ?>

<?php $this->append('sidebar-left', $this->region('sidebar-left')); ?>

<?php $this->append('sidebar-right', $this->region('sidebar-right')); ?>

<div class="p-3 mb-2 border rounded">
    <?= $this->region('content-top') ?>
</div>

<div class="p-3 mb-2 border rounded">
    <?= $this->region('content') ?>
</div>

<?php if (isset($meta)) : ?>
    <div class="p-3 mb-2 border rounded">
        <header>
            <h2><?= $meta->title ?></h2>
        </header>
        <article>
            <?= $meta->description ?>
        </article>
    </div>
<?php endif; ?>
