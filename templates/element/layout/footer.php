<footer class="mt-5 bg-light">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <div class="footer-logo text-center text-lg-left p-4">
                        <?=
                        $this->Html->image('logo.png', [
                            'alt' => 'Logo goes here',
                            'title' => 'Logo',
                            'class' => 'img-fluid',
                            'url' => ['plugin' => false, 'prefix' => false, 'controller' => 'Index', 'action' => 'index']
                        ]);
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->region('footer-main-menu') ?>
                    </div>
                    <div class="col-md-4">
                        <h4 class="block-title"><?= __d('kickstart', 'Personal cabinet') ?></h4>
                        <ul class="block-body navbar-nav">
                            <?php if ($this->Auth->isLoggedIn('Customer')): ?>
                                <li class="nav-item">
                                    <?= $this->Html->link('<i class="bi bi-card-heading me-2"></i>' . __d('shop', 'Personal data'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'settings'], ['escape' => false, 'class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= $this->Html->link('<i class="bi bi-clock-history me-2"></i>' . __d('shop', 'Order history'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'history'], ['escape' => false, 'class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= $this->Html->link('<i class="bi bi-key me-2"></i>' . __d('shop', 'Change password'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'changePassword'], ['escape' => false, 'class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= $this->Html->link('<i class="bi bi-box-arrow-right me-2"></i>' . __d('shop', 'Log out'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'logout'], ['escape' => false, 'class' => 'nav-link']) ?>
                                </li>
                            <?php else: ?>
                                <li class="nav-item"><?= $this->Html->link(__d('shop', 'Log in'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'settings'], ['rel' => 'nofollow', 'escape' => false, 'class' => 'nav-link']) ?></li>
                                <li class="nav-item"><?= $this->Html->link(__d('shop', 'Registration'), ['plugin' => 'Shop', 'controller' => 'customers', 'action' => 'add'], ['rel' => 'nofollow', 'escape' => false, 'class' => 'nav-link']) ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <?= $this->region('footer-social-icons') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center m-0 p-3 bg-white">
        <div class="container">
            ©&nbsp;<?= date("Y") ?>&nbsp; «<?= $config['Cms']['siteName'] ?? $this->request->host() ?>™»
        </div>
    </div>
</footer>