<footer class="bg-ink border-t border-ink-700 py-12">
    <div class="max-w-7xl mx-auto px-5">

        <!-- Desktop: logo vlevo, copyright vpravo -->
        <div class="hidden sm:flex items-center justify-between">
            <a href="/" class="flex-shrink-0 font-display font-black text-2xl tracking-tight leading-none" aria-label="Vykopu.to — domů">
                <span class="text-cream-50">vykopu</span><span class="text-clay">.to</span>
            </a>
            <p class="text-sm font-medium text-cream/40">
                Copyright &copy; <?= h($config['site']['title']) ?> <?= date('Y') ?>. Všechna práva vyhrazena.
            </p>
        </div>

        <!-- Mobil: stacked, centrovaný -->
        <div class="sm:hidden flex flex-col items-center gap-2 text-center">
            <a href="/" class="font-display font-black leading-none tracking-tight" style="font-size:18px" aria-label="Vykopu.to — domů">
                <span class="text-cream-50">vykopu</span><span class="text-clay">.to</span>
            </a>
            <p class="text-xs font-medium text-cream/40">
                Copyright &copy; <?= date('Y') ?> <?= h($config['site']['title']) ?>. Všechna práva vyhrazena.
            </p>
        </div>

    </div>
</footer>

<!-- Lucide icons inicializace -->
<script src="<?= h(asset_url('assets/js/lucide.min.js')) ?>"></script>
<script>lucide.createIcons();</script>

</body>
</html>
