<?php if (isset($meta)): ?>
    <?php $this->assign('title', $meta->seo_title); ?>
    <?= $this->Html->meta('description', $meta->seo_description, ['block' => true]); ?>
    <?= $this->Html->meta('keywords', $meta->seo_keywords, ['block' => true]); ?>
<?php endif; ?>
<?= $this->Html->script('home', ['block' => true]); ?>

<?php $this->append('left-sidebar', $this->region('left')); ?>

<div class="p-3 border rounded">
    <?= $this->region('center-top') ?>
</div>

<?= $this->region('center') ?>
<?php if (isset($meta)): ?>
    <div class="card mb-3">
        <div class="card-body">
            <header class="section-heading">
                <h3 class="title-section"><?= $meta->title ?></h3>
            </header>
            <article>
                <?= $meta->description ?>
            </article>
        </div>
    </div>
<?php endif; ?>