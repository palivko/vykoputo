# Vykopu.to — webová prezentace

Onepage web pro Petra Glasera, výkopové a terénní práce Fulnek a okolí.
Plain PHP + Tailwind CSS, hostováno na Blueboard.cz, automatický deploy přes GitHub Actions.

**Produkce:** https://vykopu.to

## Stack

- **Plain PHP 8.3** — žádný CMS, žádný framework; šablony přes `require` includes
- **Tailwind CSS 3** + npm build pipeline (bootstrap-icons, lucide, glightbox, leaflet, rellax)
- **Sharp** — optimalizace obrázků (`assets/images/` → `public/assets/images/`)
- **Docker Compose** — lokální vývoj (`webdevops/php-apache:8.3`, port 8080)
- **GitHub Actions** — build + deploy do Blueboard přes Git push + smoke test
- **Dependabot** — automatické PR pro updaty npm/actions závislostí

## Lokální vývoj

```bash
docker compose up      # web na http://localhost:8080
npm install            # první run — instalace závislostí
npm run dev            # Tailwind watch mode (rebuild CSS při uložení)
npm run build          # produkční build (CSS + kopie assetů + optimalizace obrázků)
```

## Struktura projektu

```
public/
  index.php              ← onepage homepage (jediná stránka webu)
  robots.txt             ← crawling pravidla pro vyhledávače
  sitemap.xml            ← sitemap pro Google Search Console
  .htaccess              ← HTTPS redirect, gzip, cache, security headers
  assets/images/         ← loga a favicona (SVG, gitováno)
                           + optimalizované fotky (generuje Sharp při buildu)

includes/
  config.php             ← site title, kontaktní údaje, anchor navigace
  header.php             ← <head> s OG tagy, fixní nav s hamburgerem
  footer.php             ← patička, inicializace Lucide ikon
  form.php               ← zpracování kontaktního formuláře (PHP mail)

src/css/app.css          ← Tailwind zdroj (base, components, utilities)
assets/images/           ← zdrojové fotky (Sharp je optimalizuje do public/)
tailwind.config.js       ← brand paleta (ink/cream/clay/stone) + fonty
docker-compose.yml       ← lokální Apache + PHP-FPM
.github/workflows/       ← deploy.yml + dependabot.yml
```

## Deploy

Push do `main` → GitHub Actions buildne (npm + Sharp) → pushne na Blueboard → smoke test.

**GitHub Secrets:** `PRODUCTION_SSH_KEY`

**GitHub Variables:** `PRODUCTION_GIT_REMOTE`, `PRODUCTION_GIT_HOST`, `PRODUCTION_TARGET_DIR`, `PRODUCTION_URL`

Detailní popis CI/CD pipeline a specifika Blueboard hostingu → [`devstack.md`](devstack.md)

## Brand

| Token | Hex | Použití |
|---|---|---|
| `ink-900` | `#1A1C1A` | Hero, footer, tmavé sekce |
| `cream` | `#F5F1EA` | Hlavní pozadí, světlé sekce |
| `clay` | `#E87722` | CTA, telefon, akcenty |
| `stone-500` | `#8B857A` | Sekundární text |

Fonty: **Archivo** (display, 600/700/900) + **Inter** (body, 400/500/600) — Google Fonts.

## Otevřené body

- [ ] Fotky dokončených zakázek od klienta → sekce Reference
- [ ] Fotky strojů od klienta (náhrada stock fotek v sekci Technika)
- [ ] OG image v rozměru 1200×630 px (`public/assets/images/og-image.jpg`)
- [ ] Registrovat v Google Search Console + odeslat sitemap
