<?php
/**
 * @var \App\View\AppView $this
 * @var mixed $breadcrumbs
 */
?>
<?php if ($breadcrumbs) : ?>
    <?php $lastIdx = count($breadcrumbs) - 1; ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Index'], ['fullBase' => true]); ?>">
                    <i class="bi bi-house-door-fill"></i>
                </a>
            </li>
            <?php foreach ($breadcrumbs as $i => $crumb) : ?>
                <?php if ($i !== $lastIdx) : ?>
                    <li class="breadcrumb-item">
                        <a href="<?= $crumb['url'] ?>"><?= $crumb['title'] ?></a>
                    </li>
                <?php else : ?>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $crumb['title'] ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
    </nav>
<?php elseif ($this->Breadcrumbs->getCrumbs()) : ?>
    <?php $this->Breadcrumbs->prepend('<i class="fas fa-home"></i>', ['plugin' => false, 'controller' => 'Index']); ?>
    <?= $this->Breadcrumbs->render(['class' => 'breadcrumb']); ?>
<?php endif; ?>
