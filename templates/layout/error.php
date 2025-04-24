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

        <section class="section-main bg padding-top-sm" id="main">
            <div class="container"> 
                <?= $this->Flash->render() ?>
                <div class="row">
                    <?php if ($this->fetch('left-sidebar')): ?>
                        <aside class="col-xl-3">
                            <?= $this->fetch('left-sidebar') ?>
                        </aside>
                        <div class="col-xl-9">
                            <?= $this->element('layout/breadcrumbs') ?>
                            <?= $this->fetch('content') ?>
                        </div>
                    <?php else: ?>
                        <div class="col-md-12">
                            <?= $this->element('layout/breadcrumbs') ?>
                            <?= $this->fetch('content') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?= $this->element('layout/footer') ?>

        <a id="scroll-up" href="#" class="btn btn-primary btn-lg scroll-up" role="button" title="Scroll up">
            <span class="fa fa-chevron-up"></span>
        </a>
        <?= $this->Html->script('app') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
