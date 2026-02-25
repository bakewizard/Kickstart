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
        <?php
        $sidebarLeft = $this->fetch('sidebar-left');
        $sidebarRight = $this->fetch('sidebar-right');
        $cols = match (true) {
            $sidebarLeft && $sidebarRight => 6,
            $sidebarLeft || $sidebarRight => 9,
            default => 12
        };
        ?>
        <div class="row">
            <?php if ($sidebarLeft) : ?>
                <aside class="col-xl-3">
                    <?= $sidebarLeft ?>
                </aside>
            <?php endif; ?>

            <main class="col-xl-<?= $cols ?>">
                <?= $this->fetch('content') ?>
            </main>

            <?php if ($sidebarRight) : ?>
                <aside class="col-xl-3">
                    <?= $sidebarRight ?>
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
