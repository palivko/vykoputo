<?php
require_once __DIR__ . '/config.php';

$pageTitle       = $pageTitle       ?? $config['site']['title'];
$pageDescription = $pageDescription ?? $config['site']['description'];
?>
<!DOCTYPE html>
<html lang="<?= h($config['site']['lang']) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($pageTitle === $config['site']['title']): ?>
        <title><?= h($pageTitle) ?></title>
    <?php else: ?>
        <title><?= h($pageTitle) ?> | <?= h($config['site']['title']) ?></title>
    <?php endif ?>
    <meta name="description" content="<?= h($pageDescription) ?>">

    <!-- Open Graph -->
    <meta property="og:type"        content="website">
    <meta property="og:locale"      content="cs_CZ">
    <meta property="og:site_name"   content="<?= h($config['site']['title']) ?>">
    <meta property="og:title"       content="<?= h($pageTitle) ?>">
    <meta property="og:description" content="<?= h($pageDescription) ?>">
    <meta property="og:url"         content="https://vykopu.to<?= h(strtok($_SERVER['REQUEST_URI'] ?? '/', '?')) ?>">
    <meta property="og:image"       content="https://vykopu.to/assets/images/bagr-hero.jpg">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"    content="Výkopové a terénní práce Fulnek a okolí — vykopu.to">

    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <!-- Google Fonts: Archivo (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= h(asset_url('assets/css/app.css')) ?>">
</head>
<body class="font-body bg-cream text-ink antialiased">

<header id="site-header" class="fixed top-0 inset-x-0 z-50 border-b border-transparent transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-5 h-20 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="flex-shrink-0 font-display font-black text-2xl tracking-tight leading-none" aria-label="vykopu.to — domů">
            <span class="text-cream">vykopu</span><span class="text-clay">.to</span>
        </a>

        <!-- Pravá strana: desktop nav + hamburger -->
        <div class="flex items-center gap-6">

            <nav class="hidden lg:flex items-center gap-7" aria-label="Hlavní navigace">
                <?php foreach ($config['nav'] as $url => $label): ?>
                    <?php if ($url === '#kontakt'): ?>
                        <a href="<?= h($url) ?>"
                           class="bg-cream-50 text-ink font-display font-bold text-[15px] rounded-md px-[22px] py-[8px] whitespace-nowrap hover:bg-cream transition-colors duration-200">
                            <?= h($label) ?>
                        </a>
                    <?php else: ?>
                        <a href="<?= h($url) ?>"
                           class="text-cream/65 hover:text-cream text-sm font-body font-bold transition-colors duration-200 whitespace-nowrap">
                            <?= h($label) ?>
                        </a>
                    <?php endif ?>
                <?php endforeach ?>
            </nav>

            <!-- Hamburger (mobile) -->
            <button id="menu-toggle"
                    type="button"
                    class="lg:hidden flex flex-col justify-center gap-[5px] p-2 text-cream"
                    aria-label="Otevřít menu"
                    aria-expanded="false"
                    aria-controls="mobile-menu">
                <span id="bar1" class="block w-6 h-[2px] bg-current transition-transform duration-200 origin-center"></span>
                <span id="bar2" class="block w-6 h-[2px] bg-current transition-opacity duration-200"></span>
                <span id="bar3" class="block w-6 h-[2px] bg-current transition-transform duration-200 origin-center"></span>
            </button>

        </div>
    </div>

    <!-- Mobilní menu -->
    <div id="mobile-menu"
         class="hidden lg:hidden border-t border-ink-700/60 bg-ink-900"
         role="navigation"
         aria-label="Mobilní navigace">
        <nav class="max-w-7xl mx-auto px-5 py-4 flex flex-col">
            <?php foreach ($config['nav'] as $url => $label): ?>
                <?php if ($url === '#kontakt'): ?>
                    <a href="<?= h($url) ?>"
                       class="mobile-nav-link mt-3 bg-cream-50 text-ink font-display font-bold text-[15px] rounded-md px-[22px] py-[10px] text-center whitespace-nowrap hover:bg-cream transition-colors duration-200">
                        <?= h($label) ?>
                    </a>
                <?php else: ?>
                    <a href="<?= h($url) ?>"
                       class="mobile-nav-link text-cream/75 hover:text-cream font-medium py-3 text-base border-b border-ink-700/40 transition-colors duration-200">
                        <?= h($label) ?>
                    </a>
                <?php endif ?>
            <?php endforeach ?>
        </nav>
    </div>
</header>

<script>
// Tmavý header — ihned při prvním scrollu, průhledný zpět nahoře
(function () {
    var header = document.getElementById('site-header');

    function update() {
        header.classList.toggle('header-scrolled', window.scrollY > 0);
    }

    update();
    window.addEventListener('scroll', update, { passive: true });
})();

(function () {
    var toggle = document.getElementById('menu-toggle');
    var menu   = document.getElementById('mobile-menu');
    var bar1   = document.getElementById('bar1');
    var bar2   = document.getElementById('bar2');
    var bar3   = document.getElementById('bar3');

    function openMenu() {
        menu.classList.remove('hidden');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Zavřít menu');
        bar1.style.transform = 'translateY(7px) rotate(45deg)';
        bar2.style.opacity   = '0';
        bar3.style.transform = 'translateY(-7px) rotate(-45deg)';
    }

    function closeMenu() {
        menu.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Otevřít menu');
        bar1.style.transform = '';
        bar2.style.opacity   = '';
        bar3.style.transform = '';
    }

    toggle.addEventListener('click', function () {
        if (menu.classList.contains('hidden')) { openMenu(); } else { closeMenu(); }
    });

    document.querySelectorAll('.mobile-nav-link').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });
})();
</script>
