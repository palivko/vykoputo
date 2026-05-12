<?php

// Globální konfigurace webu vykopu.to

$config = [
    'site' => [
        'title'       => 'vykopu.to',
        'description' => 'Výkopové a terénní práce ve Fulneku a okolí. Vlastní bagr JCB 19C-1, malotraktor Yanmar F200 a hákový kontejner do 5 tun. Nezávazná poptávka.',
        'lang'        => 'cs',
    ],

    // Kontaktní údaje — používají se v navigaci, patičce i formuláři
    'contact' => [
        'phone'   => '+420 737 600 705',
        'email'   => 'palivko@gmail.com',
        'name'    => 'Petr Glaser',
        'address' => 'Jerlochovice 61, 742 45 Fulnek',
        'area'    => 'Fulnek a okolí, okres Nový Jičín',
        'ico'     => '10837485',
        'ucet'     => '123456789/0800',
    ],

    // Onepage anchor navigace — klíč je #anchor, hodnota je popisek
    'nav' => [
        '#sluzby'        => 'Služby',
        '#technika'      => 'Technika',
        '#kde-pracujeme' => 'Kde pracujeme',
        '#reference'     => 'Reference',
        '#proc-nas'      => 'Proč nás',
        '#kontakt'       => 'Kontakt',
    ],

    // Debug se automaticky zapne na localhostu, jinak vypnutý.
    'debug' => in_array($_SERVER['SERVER_NAME'] ?? '', ['localhost', '127.0.0.1'], true),
];

// Helpery dostupné v šablonách.

/**
 * Vypíše escapovaný text (HTML kontext).
 */
function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Vrátí absolutní URL k assetu s cache-busting query stringem podle filemtime().
 * Příklad: asset_url('assets/css/app.css') → /assets/css/app.css?v=1234567890
 */
function asset_url(string $path): string {
    $path = ltrim($path, '/');
    $file = __DIR__ . '/../public/' . $path;
    $ver  = file_exists($file) ? '?v=' . filemtime($file) : '';
    return '/' . $path . $ver;
}

/**
 * Vrátí aktuální cestu (path) bez query stringu — pro označení aktivního menu itemu.
 */
function current_path(): string {
    $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
    // /about.php → /about (kvůli matchování s nav klíči)
    return rtrim(preg_replace('/\.php$/', '', $uri), '/') ?: '/';
}
