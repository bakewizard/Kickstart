<footer class="mt-5 bg-light">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <div class="footer-logo text-center text-lg-left p-4">
                        <?=
                        $this->Html->image('logo.png', [
                            'alt' => $config['Cms']['siteName'] ?? $this->request->host(),
                            'title' => $config['Cms']['siteName'] ?? $this->request->host(),
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
                        <?= $this->region('footer-left') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->region('footer-center') ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <?= $this->region('footer-right') ?>
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