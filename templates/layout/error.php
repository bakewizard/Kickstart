<?php
/**
 * @var \App\View\AppView $this
 * @var array $config
 */
?>
<!doctype html>
<html lang="<?= $config['App']['I18n']['currentLanguage'] ?>">
    <head>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->charset() ?>
        <?= $this->fetch('meta'); ?>
        <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('app') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <?= $this->element('layout/header') ?>

        <div class="container-lg"> 
            <?= $this->Flash->render() ?>
            <?= $this->element('layout/breadcrumbs') ?>
            <div class="row">
                <?php if ($this->fetch('left-sidebar')) : ?>
                    <aside class="col-xl-3">
                        <?= $this->fetch('left-sidebar') ?>
                    </aside>
                <?php endif; ?>

                <?php if ($this->fetch('left-sidebar') && $this->fetch('right-sidebar')) : ?>
                    <main class="col-xl-6">
                        <?= $this->fetch('content') ?>
                    </main>
                <?php elseif ($this->fetch('left-sidebar') || $this->fetch('right-sidebar')) : ?>
                    <main class="col-xl-9">
                        <?= $this->fetch('content') ?>
                    </main>
                <?php else : ?>
                    <main class="col-12">
                        <?= $this->fetch('content') ?>
                    </main>
                <?php endif; ?>

                <?php if ($this->fetch('right-sidebar')) : ?>
                    <aside class="col-xl-3">
                        <?= $this->fetch('right-sidebar') ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>

        <?= $this->element('layout/footer') ?>

        <a id="scroll-up" href="#" class="btn btn-primary btn-lg scroll-up" role="button" title="Scroll up">
            <span class="fa fa-chevron-up"></span>
        </a>
        <?= $this->Html->script('app') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
