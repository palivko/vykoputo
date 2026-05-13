<?php
require __DIR__ . '/../includes/form.php';

// ── Hlavička stránky ─────────────────────────────────────────────────────────
$pageTitle       = 'Výkopové a terénní práce Fulnek a okolí';
$pageDescription = 'Výkopové práce, terénní úpravy, pokládka dlažby a realizace plotů ve Fulneku a okolí. Vlastní bagr JCB 19C-1, malotraktor Yanmar F200 a hákový kontejner s nosností 5 tun. Nezávazná poptávka.';
require __DIR__ . '/../includes/header.php';
?>

<main>

<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 1: HERO
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="hero"
         class="relative min-h-[680px] flex flex-col bg-ink-900"
         style="background-image: linear-gradient(to bottom, rgba(26,28,26,0.95) 0%, rgba(26,28,26,0.85) 40%, rgba(26,28,26,0.75) 100%), url('/assets/images/bagr-hero.jpg'); background-size: cover; background-position: center;">

    <div class="flex-1 flex flex-col justify-end max-w-7xl mx-auto w-full px-5 pb-20 pt-36">

        <p class="section-label">Fulnek a okolí — okres Nový Jičín</p>

        <h1 class="font-display font-black text-hero text-cream mb-6 max-w-2xl">
            Kopeme,<br>pokládáme,<br>upravujeme<span class="text-clay">.</span>
        </h1>

        <p class="font-body text-cream/75 text-lg max-w-xl mb-10 leading-relaxed">
            Vlastní bagr, malotraktor a hákový kontejner s&nbsp;nosností 5&nbsp;tun.
            Služby pro stavebníky, rodiny, bazénáře i&nbsp;zahradníky.
        </p>

        <div class="flex flex-col sm:flex-row gap-5 items-start sm:items-center">
            <a href="#kontakt" class="btn-primary">Nezávazná poptávka</a>
            <a href="tel:+420737600705" class="font-display font-semibold text-clay text-xl tracking-wide hover:text-clay-600 transition-colors duration-200">
                +420&nbsp;737&nbsp;600&nbsp;705
            </a>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 2: CO UMÍME (světlá)
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="sluzby" class="bg-cream py-24 px-5">
    <div class="max-w-7xl mx-auto">

        <div class="mb-14">
            <span class="section-label">Co umíme</span>
            <h2 class="font-display font-black text-h2 text-ink mb-4">
                Výkopové a terénní práce<span class="text-clay">.</span>
            </h2>
            <p class="font-body text-stone-500 text-lg">
                Komplexní služby pro rodinné domy, zahrady a bazény. Od základů po povrchové úpravy.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Výkopové práce -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="shovel" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Výkopové práce</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Základy, bazény, jímky, inženýrské sítě, vrty pro plotové sloupky.
                </p>
            </article>

            <!-- Terénní úpravy -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="mountain" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Terénní úpravy</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Srovnání pozemků, svahování, modelace zahrad, přesun zeminy.
                </p>
            </article>

            <!-- Pokládka dlažby -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="grid-3x3" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Pokládka dlažby</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Vjezdy, chodníky, terasy, parkovací stání ze zámkové dlažby.
                </p>
            </article>

            <!-- Realizace plotů -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="fence" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Realizace plotů</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Vrtání sloupků, betonáž patek, montáž drátěných i panelových plotů.
                </p>
            </article>

            <!-- Založení trávníku -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="sprout" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Založení trávníku</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Příprava půdy frézou, srovnání povrchu, výsev a první zálivka.
                </p>
            </article>

            <!-- Dokončování staveb -->
            <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                <div class="w-12 h-12 bg-clay/10 rounded-lg flex items-center justify-center mb-5 text-clay">
                    <i data-lucide="house" class="w-6 h-6"></i>
                </div>
                <h3 class="font-display font-bold text-xl text-ink mb-2">Dokončování staveb</h3>
                <p class="font-body text-stone-500 leading-relaxed">
                    Hrubé úpravy okolí domu, příjezdové cesty, drenáže.
                </p>
            </article>

        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 3: NAŠE TECHNIKA (tmavá)
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="technika" class="bg-ink-900 py-24 px-5">
    <div class="max-w-7xl mx-auto">

        <div class="mb-14">
            <span class="section-label">Naše technika</span>
            <h2 class="font-display font-black text-h2 text-cream mb-4">
                Vlastní stroje, vlastní termíny<span class="text-clay">.</span>
            </h2>
            <p class="font-body text-stone-500 text-lg">
                Vše, co potřebujeme, máme ihned k dispozici. Žádné půjčovny ani subdodavatelé.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <!-- JCB 19C-1 -->
            <article class="bg-ink-800 rounded-lg overflow-hidden">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/assets/images/bagr.png"
                         alt="Pásový minibagr JCB 19C-1"
                         class="w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-clay/80 via-clay/60 to-clay/40 pointer-events-none"></div>
                </div>
                <div class="p-6">
                    <p class="text-clay font-display font-semibold uppercase tracking-widest text-xs mb-1">Bagr</p>
                    <h3 class="font-display font-bold text-xl text-cream mb-3">JCB 19C&#8209;1</h3>
                    <p class="font-body text-stone-500 leading-relaxed text-sm">
                        Pásový minibagr s hloubkou výkopu 3,1&nbsp;m. Vejde se do uzavřených
                        prostor i na zahrady. Přesná práce v&nbsp;těsném terénu.
                    </p>
                </div>
            </article>

            <!-- Yanmar F200 -->
            <article class="bg-ink-800 rounded-lg overflow-hidden">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/assets/images/traktor.jpg"
                         alt="Malotraktor Yanmar F200"
                         class="w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-clay/80 via-clay/60 to-clay/40 pointer-events-none"></div>
                </div>
                <div class="p-6">
                    <p class="text-clay font-display font-semibold uppercase tracking-widest text-xs mb-1">Malotraktor</p>
                    <h3 class="font-display font-bold text-xl text-cream mb-3">Yanmar F200</h3>
                    <p class="font-body text-stone-500 leading-relaxed text-sm">
                        Univerzální malotraktor pro úpravy zahrad, srovnávání terénu,
                        frézování i přesun materiálu. Zvládne i úzké průjezdy.
                    </p>
                </div>
            </article>

            <!-- Hákový kontejner -->
            <article class="bg-ink-800 rounded-lg overflow-hidden">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="/assets/images/kontejner.jpg"
                         alt="Hákový kontejner 5 t"
                         class="w-full h-full object-cover"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-clay/80 via-clay/60 to-clay/40 pointer-events-none"></div>
                </div>
                <div class="p-6">
                    <p class="text-clay font-display font-semibold uppercase tracking-widest text-xs mb-1">Kontejner</p>
                    <h3 class="font-display font-bold text-xl text-cream mb-3">Hákový 5&nbsp;tun</h3>
                    <p class="font-body text-stone-500 leading-relaxed text-sm">
                        Odvoz vykopané zeminy, suti a demoličního odpadu.
                        Nosnost 5&nbsp;tun, dostačující pro většinu zakázek.
                    </p>
                </div>
            </article>

        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 4: KDE PRACUJEME (světlá) — skrytá na mobilu
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="kde-pracujeme" class="bg-cream py-20 px-5">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Levý sloupec: popis a seznam obcí -->
            <div>
                <span class="section-label">Kde pracujeme</span>
                <h2 class="font-display font-black text-h2 text-ink mb-4">
                    Fulnek a okolí,<br />okres Nový Jičín<span class="text-clay">.</span>
                </h2>
                <p class="font-body text-stone-500 text-lg mb-10">
                    Dojezd zpravidla do 30 minut. Vzdálenější zakázky podle dohody.
                </p>

                <div class="grid grid-cols-3 gap-x-6 gap-y-3 mb-6">
                    <span class="font-display font-bold text-clay text-base">Fulnek</span>
                    <span class="font-display font-semibold text-ink">Stachovice</span>
                    <span class="font-display font-semibold text-ink">Nový Jičín</span>

                    <span class="font-display font-semibold text-ink">Bílovec</span>
                    <span class="font-display font-semibold text-ink">Bartošovice</span>
                    <span class="font-display font-semibold text-ink">Skotnice</span>

                    <span class="font-display font-semibold text-ink">Odry</span>
                    <span class="font-display font-semibold text-ink">Vítkov</span>
                    <span class="font-display font-semibold text-ink">Suchdol n.&nbsp;O.</span>

                    <span class="font-display font-semibold text-ink">Studénka</span>
                    <span class="font-display font-semibold text-ink">Kunín</span>
                    <span class="font-display font-semibold text-ink">Mankovice</span>
                </div>

                <p class="font-body text-stone-500 text-sm">
                    … a okolní obce do 30&nbsp;km. Bez ostychu nás ale kontaktujte i na vzdálenější zakázky.
                </p>
            </div>

            <!-- Pravý sloupec: SVG diagram akčního radiusu -->
            <div class="overflow-visible" aria-hidden="true">
                <svg viewBox="0 0 360 360" xmlns="http://www.w3.org/2000/svg"
                     class="block w-full lg:w-[560px] lg:h-[560px] lg:-ml-[100px]">
                    <!-- Soustředné kruhy -->
                    <circle cx="180" cy="180" r="60"  fill="none" stroke="#D8D2C7" stroke-width="1"/>
                    <circle cx="180" cy="180" r="115" fill="none" stroke="#D8D2C7" stroke-width="1"/>
                    <circle cx="180" cy="180" r="160" fill="none" stroke="#D8D2C7" stroke-width="1" stroke-dasharray="4 4"/>

                    <!-- Fulnek — střed -->
                    <circle cx="180" cy="180" r="8" fill="#E87722"/>
                    <text x="194" y="184" font-family="Inter, sans-serif" font-size="13" font-weight="600" fill="#0F100F">Fulnek</text>

                    <!-- Blízká pásma (do 10 km) -->
                    <circle cx="178" cy="118" r="4" fill="#8B857A"/>
                    <text x="140" y="113" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Bartošovice</text>

                    <circle cx="205" cy="215" r="4" fill="#8B857A"/>
                    <text x="212" y="219" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Stachovice</text>

                    <!-- Střední pásmo (10–20 km) -->
                    <circle cx="88"  cy="155" r="4" fill="#8B857A"/>
                    <text x="20"  y="151" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Bílovec</text>

                    <circle cx="275" cy="138" r="4" fill="#8B857A"/>
                    <text x="280" y="133" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Odry</text>

                    <circle cx="95"  cy="215" r="4" fill="#8B857A"/>
                    <text x="20"  y="219" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Skotnice</text>

                    <circle cx="295" cy="195" r="4" fill="#8B857A"/>
                    <text x="300" y="199" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Vítkov</text>

                    <circle cx="155" cy="270" r="4" fill="#8B857A"/>
                    <text x="110" y="285" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Mankovice</text>

                    <circle cx="215" cy="265" r="4" fill="#8B857A"/>
                    <text x="222" y="269" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Kunín</text>

                    <!-- Vnější pásmo (20–30 km) -->
                    <circle cx="108" cy="68"  r="4" fill="#8B857A"/>
                    <text x="42"  y="64"  font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Studénka</text>

                    <circle cx="160" cy="325" r="4" fill="#8B857A"/>
                    <text x="88"  y="341" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Nový Jičín</text>

                    <circle cx="305" cy="275" r="4" fill="#8B857A"/>
                    <text x="255" y="295" font-family="Inter, sans-serif" font-size="11" fill="#8B857A">Suchdol n.&nbsp;O.</text>
                </svg>
            </div>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 5: REFERENCE (tmavá) — skrytá na mobilu
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="reference" class="bg-ink-900 py-24 px-5">
    <div class="max-w-7xl mx-auto">

        <div class="mb-14">
            <span class="section-label">Reference</span>
            <h2 class="font-display font-black text-h2 text-cream mb-4">
                Hotové zakázky<span class="text-clay">.</span>
            </h2>
            <p class="font-body text-stone-500 text-lg">
                Věříme, že nejlepší reference je hotová práce.
                Tady jsou důkazy — reálné zakázky z&nbsp;Fulneku a&nbsp;okolí.
            </p>
        </div>

        <!-- Galerie placeholder — fotky doplní klient -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php for ($i = 1; $i <= 6; $i++): ?>
            <div class="aspect-[4/3] bg-ink-800 rounded-lg flex items-center justify-center text-ink-700 border border-ink-700">
                <i data-lucide="image" class="w-10 h-10 opacity-30"></i>
            </div>
            <?php endfor ?>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 6: PROČ NÁS + FAQ (světlá)
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="proc-nas" class="bg-cream py-24 px-5">
    <div class="max-w-7xl mx-auto">

        <!-- USP -->
        <div class="mb-20">
            <span class="section-label">Proč Vykopu.to</span>
            <h2 class="font-display font-black text-h2 text-ink mb-12">
                Vlastní stroje, osobní přístup<span class="text-clay">.</span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                    <p class="font-display font-black text-4xl text-clay mb-4 leading-none">01</p>
                    <h3 class="font-display font-bold text-lg text-ink mb-2">Lokální</h3>
                    <p class="font-body text-stone-500 text-sm leading-relaxed">
                        Sídlíme přímo ve Fulneku. Známe terén,
                        dojedeme rychle, pomůžeme i s&nbsp;drobnými pracemi.
                    </p>
                </article>

                <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                    <p class="font-display font-black text-4xl text-clay mb-4 leading-none">02</p>
                    <h3 class="font-display font-bold text-lg text-ink mb-2">Vlastní technika</h3>
                    <p class="font-body text-stone-500 text-sm leading-relaxed">
                        Bagr, traktor i kontejner máme vlastní.
                        Žádné půjčovny, žádné čekání na&nbsp;subdodavatele.
                    </p>
                </article>

                <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                    <p class="font-display font-black text-4xl text-clay mb-4 leading-none">03</p>
                    <h3 class="font-display font-bold text-lg text-ink mb-2">Pracuju sám</h3>
                    <p class="font-body text-stone-500 text-sm leading-relaxed">
                        Jsem živnostník. Bagrují vám stejné ruce, se kterými
                        si telefonujete. Bez zbytečného zdržení.
                    </p>
                </article>

                <article class="bg-cream-50 border border-cream-200 rounded-lg p-7">
                    <p class="font-display font-black text-4xl text-clay mb-4 leading-none">04</p>
                    <h3 class="font-display font-bold text-lg text-ink mb-2">Rychlá reakce</h3>
                    <p class="font-body text-stone-500 text-sm leading-relaxed">
                        Voláme zpátky do 24&nbsp;hodin.
                        Prohlídku na místě zpravidla zvládneme do&nbsp;týdne.
                    </p>
                </article>

            </div>
        </div>

        <!-- FAQ -->
        <div>
            <span class="section-label">FAQ</span>
            <h3 class="font-display font-black text-4xl text-ink mb-10">
                Na co se nejčastěji ptáte<span class="text-clay">.</span>
            </h3>

            <div class="divide-y divide-cream-200">

                <details class="group py-5">
                    <summary class="flex justify-between items-center cursor-pointer list-none gap-4">
                        <span class="font-display font-semibold text-ink text-lg">Pracujete i o víkendech?</span>
                        <span class="text-clay text-2xl flex-shrink-0 transition-transform duration-200 group-open:rotate-45" aria-hidden="true">+</span>
                    </summary>
                    <p class="mt-3 font-body text-stone-500 pr-10 leading-relaxed">
                        Ano, po předchozí domluvě. Pro naléhavé zakázky se snažíme být flexibilní.
                    </p>
                </details>

                <details class="group py-5">
                    <summary class="flex justify-between items-center cursor-pointer list-none gap-4">
                        <span class="font-display font-semibold text-ink text-lg">Kolik to bude stát?</span>
                        <span class="text-clay text-2xl flex-shrink-0 transition-transform duration-200 group-open:rotate-45" aria-hidden="true">+</span>
                    </summary>
                    <p class="mt-3 font-body text-stone-500 pr-10 leading-relaxed">
                        Cena závisí na rozsahu zakázky, přístupnosti terénu a objemu zeminy.
                        Přesnou cenu stanovíme po prohlídce na místě — zavolejte nebo pošlete
                        poptávku a domluvíme si termín.
                    </p>
                </details>

                <details class="group py-5">
                    <summary class="flex justify-between items-center cursor-pointer list-none gap-4">
                        <span class="font-display font-semibold text-ink text-lg">Zajistíte i odvoz vykopané zeminy?</span>
                        <span class="text-clay text-2xl flex-shrink-0 transition-transform duration-200 group-open:rotate-45" aria-hidden="true">+</span>
                    </summary>
                    <p class="mt-3 font-body text-stone-500 pr-10 leading-relaxed">
                        Ano. Hákový kontejner s nosností 5&nbsp;tun je součástí naší techniky.
                        Vykopat i odvézt zvládneme v jedné návštěvě.
                    </p>
                </details>

                <details class="group py-5">
                    <summary class="flex justify-between items-center cursor-pointer list-none gap-4">
                        <span class="font-display font-semibold text-ink text-lg">Děláte i menší zakázky?</span>
                        <span class="text-clay text-2xl flex-shrink-0 transition-transform duration-200 group-open:rotate-45" aria-hidden="true">+</span>
                    </summary>
                    <p class="mt-3 font-body text-stone-500 pr-10 leading-relaxed">
                        Ano. Nebojíme se ani výkopu pro jeden plotový sloupek nebo
                        drobných terénních úprav na zahradě. Zavolejte, probereme.
                    </p>
                </details>

                <details class="group py-5">
                    <summary class="flex justify-between items-center cursor-pointer list-none gap-4">
                        <span class="font-display font-semibold text-ink text-lg">Jak rychle se dá domluvit prohlídka?</span>
                        <span class="text-clay text-2xl flex-shrink-0 transition-transform duration-200 group-open:rotate-45" aria-hidden="true">+</span>
                    </summary>
                    <p class="mt-3 font-body text-stone-500 pr-10 leading-relaxed">
                        Obvykle do týdne. V rozběhlé sezóně, v průběhu jara a léta, doporučujeme
                        objednat se s předstihem.
                    </p>
                </details>

            </div>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════════════════════════
     SEKCE 7: POPTÁVKA + KONTAKT (tmavá, s bg foto)
     ══════════════════════════════════════════════════════════════════════════ -->
<section id="kontakt"
         class="relative bg-ink-900 py-[120px] px-5"
         style="background-image: linear-gradient(to right, rgba(26,28,26,0.97) 0%, rgba(26,28,26,0.85) 50%, rgba(26,28,26,0.70) 100%), url('/assets/images/contact_bg.jpg'); background-size: cover; background-position: center right;">
    <div class="max-w-7xl mx-auto">

        <!-- Celošířkový header sekce -->
        <div class="mb-16">
            <span class="section-label">Nezávazná poptávka</span>
            <h2 class="font-display font-black text-h2 text-cream mb-4">
                Pošlete poptávku, ozveme se do 24&nbsp;h<span class="text-clay">.</span>
            </h2>
            <p class="font-body text-cream/70 text-lg leading-relaxed">
                Stačí napsat, co potřebujete. Cenu domluvíme
                po&nbsp;prohlídce na&nbsp;místě, žádné překvapení později.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">

            <!-- Levý sloupec: kontaktní info -->
            <div>
                <ul class="space-y-8 font-body">
                    <li>
                        <p class="text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">Telefon</p>
                        <a href="tel:+420737600705"
                           class="text-clay font-display font-bold text-3xl hover:text-clay-600 transition-colors tracking-tight">
                            +420&nbsp;737&nbsp;600&nbsp;705
                        </a>
                    </li>
                    <li>
                        <p class="text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">E-mail</p>
                        <a href="mailto:<?= h($config['contact']['email']) ?>"
                           class="text-cream font-display font-semibold text-xl hover:text-clay transition-colors tracking-tight">
                            <?= h($config['contact']['email']) ?>
                        </a>
                    </li>
                    <li>
                        <p class="text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">Působíme</p>
                        <span class="text-cream font-display font-semibold text-xl tracking-tight"><?= h($config['contact']['area']) ?></span>
                    </li>
                    <li>
                        <p class="text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">Fakturační údaje</p>
                        <div class="text-cream font-display font-semibold text-xl tracking-tight leading-relaxed">
                            <?= h($config['contact']['name']) ?><br>
                            <?= h($config['contact']['address']) ?><br>
                            IČO: <?= h($config['contact']['ico']) ?><br>
                            Číslo účtu: <?= h($config['contact']['ucet']) ?>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Pravý sloupec: formulář v boxu (2/3 šířky) -->
            <div class="lg:col-span-2 bg-ink-800 rounded-lg p-10 border border-ink-700">
                <?php if ($formSent): ?>
                    <!-- Potvrzení odeslání -->
                    <div class="text-center py-6">
                        <div class="text-success mb-4 flex justify-center">
                            <i data-lucide="circle-check-big" class="w-12 h-12"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl text-cream mb-2">Poptávka odeslána!</h3>
                        <p class="font-body text-stone-500">
                            Ozveme se vám do 24 hodin. Děkujeme.
                        </p>
                    </div>
                <?php else: ?>
                    <form method="POST" action="#kontakt" class="space-y-6" novalidate>
                        <input type="hidden" name="_form" value="1">
                        <!-- Honeypot — pro lidi neviditelné -->
                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                        <?php if ($formError): ?>
                            <div class="bg-error/10 border border-error/40 text-error text-sm rounded px-4 py-3 font-body">
                                Nepodařilo se odeslat. Vyplňte prosím jméno, e-mail a zprávu.
                            </div>
                        <?php endif ?>

                        <div>
                            <label for="name" class="block text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">
                                Jméno <span class="text-clay">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                   value="<?= h($_POST['name'] ?? '') ?>"
                                   class="w-full bg-ink-900 border border-ink-700 text-cream placeholder-stone-500 px-4 py-3.5 rounded font-body text-base focus:outline-none focus:border-clay transition-colors"
                                   placeholder="Vaše jméno">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">
                                E-mail <span class="text-clay">*</span>
                            </label>
                            <input type="email" id="email" name="email" required
                                   value="<?= h($_POST['email'] ?? '') ?>"
                                   class="w-full bg-ink-900 border border-ink-700 text-cream placeholder-stone-500 px-4 py-3.5 rounded font-body text-base focus:outline-none focus:border-clay transition-colors"
                                   placeholder="vas@email.cz">
                        </div>

                        <div>
                            <label for="phone" class="block text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">
                                Telefon
                            </label>
                            <input type="tel" id="phone" name="phone"
                                   value="<?= h($_POST['phone'] ?? '') ?>"
                                   class="w-full bg-ink-900 border border-ink-700 text-cream placeholder-stone-500 px-4 py-3.5 rounded font-body text-base focus:outline-none focus:border-clay transition-colors"
                                   placeholder="+420">
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-display font-semibold text-cream/50 uppercase tracking-widest mb-2">
                                Krátká zpráva <span class="text-clay">*</span>
                            </label>
                            <textarea id="message" name="message" required rows="4"
                                      class="w-full bg-ink-900 border border-ink-700 text-cream placeholder-stone-500 px-4 py-3.5 rounded font-body text-base focus:outline-none focus:border-clay transition-colors resize-none"
                                      placeholder="Popište prosím, co potřebujete — druh práce, přibližnou plochu nebo objem, lokalitu a termín."><?= h($_POST['message'] ?? '') ?></textarea>
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center text-center py-5">
                            Odeslat poptávku
                        </button>
                    </form>
                <?php endif ?>
            </div>

        </div>
    </div>
</section>

</main>

<?php require __DIR__ . '/../includes/footer.php' ?>
