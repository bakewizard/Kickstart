<div class="btn-group">
    <?php foreach ($config['App']['I18n']['languages'] as $lang): ?>
        <?=
        $this->Html->link(strtoupper($lang), ['lang' => ($lang === $config['App']['I18n']['defaultLanguage']) ? false : $lang] + $this->request->getQueryParams() + $this->request->getParam('pass'), [
            'role' => 'button',
            'rel' => 'nofollow',
            'title' => $lang,
            'escape' => false,
            'class' => 'btn px-1 py-0 ' . ($lang === $config['App']['I18n']['currentLanguage'] ? 'btn-primary text-light' : 'btn-outline-primary')
        ])
        ?>
    <?php endforeach ?>
</div>