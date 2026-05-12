# Web Starter

Šablona pro nový web v plain PHP (bez CMS) na sdíleném PHP hostingu s automatickým CI/CD přes GitHub Actions.

## Co je v balíčku

- **Plain PHP** s `includes/header.php` + `includes/footer.php` (žádný CMS, žádný framework)
- **Tailwind CSS** + npm build pipeline (Tailwind, bootstrap-icons, lucide, leaflet, rellax, glightbox)
- **Sharp** pro optimalizaci obrázků
- **Docker Compose** pro lokální vývoj (`webdevops/php-apache:8.3`)
- **GitHub Actions** workflow `deploy.yml` — build + push do hosting `production` branch + smoke test
- **Dependabot** pro automatické updaty npm/actions závislostí

Architektura, specifika hostingu a podrobný checklist nasazení jsou v [`devstack.md`](devstack.md).

## Rychlé spuštění (lokálně)

```bash
docker compose up      # web na http://localhost:8080
npm install            # první run — instalace npm závislostí
npm run dev            # Tailwind watch mode
```

## Setup nového projektu (krátká verze)

1. Klikni „Use this template" v GitHubu (nebo `git clone` a `rm -rf .git && git init`)
2. Customize `package.json` (`name`, `description`) a `includes/config.php` (title, description, nav)
3. Objednej hosting Blueboard (nebo ekvivalent), aktivuj Git přístup, vytvoř subdoménu jako adresář v rootu
4. Vygeneruj SSH deploy klíč: `ssh-keygen -t ed25519 -f deploy_key -N "" -C "github-actions"`
5. Veřejný klíč přidej do hosting Git sekce
6. V GitHub Settings → Secrets and variables → Actions:
   - **Secrets:** `PRODUCTION_SSH_KEY`
   - **Variables:** `PRODUCTION_TARGET_DIR`, `PRODUCTION_GIT_REMOTE`, `PRODUCTION_GIT_HOST`, `PRODUCTION_URL`
7. Push do `main` → deploy proběhne → otevři produkční URL

Detailní kroky v [`devstack.md`](devstack.md) (sekce „Postup nasazení nového projektu").

## Build pipeline

```bash
npm run build       # produkční build (kopie assetů + minified Tailwind)
npm run dev         # Tailwind watch mode
```

Build vytvoří soubory v `public/assets/` (gitignored — generuje GitHub Actions před deployem). Pro lokální testování stačí pustit `npm run build` jednou; pro vývoj použij `npm run dev`.

## Struktura

```
public/                ← document root (Apache zde hledá index.php)
  index.php            ← homepage
  about.php            ← příklad další stránky (dostupná i jako /about)
  .htaccess            ← HTTPS, gzip, cache, security headers, pretty URLs
  assets/              ← vybuildované CSS/JS/obrázky (gitignored)
includes/              ← PHP includes (header, footer, config, helpery)
src/css/               ← zdrojová Tailwind CSS (app.css)
assets/images/         ← zdrojové obrázky (Sharp je optimalizuje do public/)
scripts/               ← build skripty (optimize-images.mjs)
.github/               ← GitHub Actions workflow + Dependabot
package.json           ← npm závislosti + build scripty
tailwind.config.js     ← Tailwind theme (per-projekt customize)
docker-compose.yml     ← lokální Apache + PHP-FPM
```

Generované adresáře (`node_modules/`, build artefakty v `public/assets/`) jsou gitignored.

## Pretty URLs

`.htaccess` automaticky mapuje URL bez přípony na `.php` soubor — `/about` → `/about.php`. Stačí přidat soubor do `public/` a hned je dostupný oběma způsoby.

## Více info

- Architektura CI/CD a specifika hostingu → [`devstack.md`](devstack.md)
- [Tailwind docs](https://tailwindcss.com/docs)
- [Blueboard nápověda](https://hosting.blueboard.cz/napoveda/)
