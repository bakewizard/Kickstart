<header id="header" class="header py-1 mb-3 shadow-sm">   
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-2 text-center text-xl-start">
                <?=
                $this->Html->image('logo.png', [
                    'alt' => 'Logo goes here',
                    'title' => 'Logo',
                    'class' => 'img-fluid',
                    'url' => ['plugin' => false, 'prefix' => false, 'controller' => 'Index', 'action' => 'index']
                ]);
                ?>
            </div>
            <div class="col-12 col-lg-8">
                <nav class="navbar navbar-top navbar-expand-lg p-0">
                    <div class="container justify-content-center">
                        <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#top-navbar" aria-controls="top-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-list"></i>
                        </button>

                        <div class="collapse navbar-collapse justify-content-center" id="top-navbar">
                            <?= $this->region('header-main-menu') ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-2">
                <div class="d-flex justify-content-center justify-content-xl-end p-1">
                    <?php if (!isset($exceptions)): ?>
                        <?php if (count($config['App']['I18n']['languages']) > 1): ?>
                            <?= $this->element('/layout/languages_switch') ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
