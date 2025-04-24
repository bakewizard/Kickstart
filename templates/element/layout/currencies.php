<?php $currencies = $this->request->getAttribute('currencies'); ?>
<?php if (!empty($currencies) && count($currencies) >= 2): ?>
    <?php $currencyHelper = $this->loadHelper('Shop.Currency') ?>
    <?php $selectedCurrency = $currencyHelper->current() ?>
    <div class="dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-fw fa-money-bill"></i> <?= $selectedCurrency->name ?> </a>
        <div class="dropdown-menu dropdown-menu-right">
            <?php foreach ($currencies as $id => $currency): ?>
                <?=
                $this->Html->link($currency->name, ['plugin' => 'Shop', 'controller' => 'Catalog', 'action' => 'currency', 'code' => $currency->id], [
                    'class' => ($id === $selectedCurrency->id ? 'dropdown-item active' : 'dropdown-item'),
                    'rel' => 'nofollow'
                ])
                ?>
            <?php endforeach ?>
        </div>
    </div>
<?php endif; ?>
