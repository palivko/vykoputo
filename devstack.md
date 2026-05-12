# Web Starter — vývojová dokumentace

Tento dokument popisuje **technický stack, vývojový workflow a nasazení** webu postaveného na této šabloně. Projektové zadání (cíl, rozsah stránek, obsahové specifikace) si vytvoř v separátním souboru (např. `ai-context.md` v rootu projektu) podle potřeb klienta.

## Technologie

Stack:

- **Plain PHP** 8.3 (žádný framework, žádný CMS) — šablony s `require` includes
- **PHP** v Docker image `webdevops/php-apache:8.3` (Apache + PHP-FPM)
- **Tailwind CSS** 3.x kompilovaná přes npm
- **Node.js** 24+ (deklarováno v `engines` v package.json)
- **Sharp** pro optimalizaci obrázků (build step)
- **npm assety:**
  - `bootstrap-icons` — ikonový font
  - `glightbox` — lightbox pro galerie
  - `leaflet` — mapy
  - `lucide` — SVG ikony
  - `rellax` — parallax efekty
- **HTML5** se sémantickou strukturou
- **Docker** + Docker Compose pro lokální vývoj
- **GitHub Actions** pro CI/CD (deploy workflow)

## Struktura projektu

```
public/                   ← document root (Apache zde hledá index.php)
  index.php               ← homepage
  about.php               ← příklad další stránky
  .htaccess               ← HTTPS, gzip, cache, security headers, pretty URLs
  assets/
    images/               ← optimalizované obrázky (generuje Sharp)
    css/                  ← vybuildované CSS (gitignored, generuje GitHub Actions)
    js/                   ← vybuildované JS (gitignored)
    fonts/                ← bootstrap-icons fonty (gitignored)

includes/                 ← PHP partials a konfigurace
  config.php              ← site title, description, nav, helpery (h(), asset_url(), current_path())
  header.php              ← <head> + <header> včetně navigace
  footer.php              ← <footer> + </body>

src/
  css/
    app.css               ← Tailwind zdroj (@import bootstrap-icons + Tailwind direktivy)
  js/                     ← (volitelně) zdrojový JS

assets/
  images/                 ← zdrojové obrázky (jpg/png) — Sharp je optimalizuje do public/

scripts/                  ← build skripty (optimize-images.mjs apod.)

.github/workflows/        ← GitHub Actions (deploy.yml)

package.json              ← npm závislosti + build scripty
package-lock.json         ← uzamčené npm verze, commituje se
tailwind.config.js        ← Tailwind konfigurace (theme, content paths)
docker-compose.yml        ← lokální Apache + PHP-FPM dev prostředí
.gitignore                ← ignoruje node_modules, build artefakty, runtime
README.md                 ← onboarding pro vývojáře
devstack.md               ← tento dokument

# Generované, gitignored:
node_modules/             ← npm závislosti (instaluje npm)
public/assets/css/        ← Tailwind output + kopie z node_modules
public/assets/js/         ← kopie z node_modules
```

## Coding rules

- používej sémantické HTML
- odděl CSS od HTML
- nepoužívej inline CSS
- používej jednoduché PHP šablony s `require` includes
- vždy escapuj uživatelský / dynamický text helperem `h()` z `includes/config.php`

## Přístupnost

Dodrž:

- sémantické HTML
- správnou strukturu nadpisů
- dobrý kontrast

## Lokální vývoj na Docker

Dev prostředí:

- Image **webdevops/php-apache:8.3** (Apache + PHP-FPM, nikoliv Nginx)
- Port: `8080` → web na **http://localhost:8080**
- Document root: `/var/www/html/public` (přes env proměnnou `WEB_DOCUMENT_ROOT`)

### Spouštění

```bash
docker compose up         # web nastartuje na :8080
npm install               # první run — instalace npm závislostí
npm run dev               # Tailwind watch mode (build CSS při uložení)
npm run build             # produkční build (kopie assetů + minified Tailwind)
```

### npm build pipeline

`npm run build` provede:

1. `copy-fonts` — zkopíruje bootstrap-icons fonty do `public/assets/css/fonts/` a `bootstrap-icons.css` do `src/css/` (kvůli @import v `app.css`)
2. `copy-js` — zkopíruje JS knihovny (rellax, leaflet, lucide, glightbox) z `node_modules/` do `public/assets/`
3. `optimize-images` — projde `assets/images/` a vytvoří optimalizované verze v `public/assets/images/` (Sharp, viz `scripts/optimize-images.mjs`)
4. `build-css` — Tailwind kompilace `src/css/app.css` → `public/assets/css/app.css` (minified)

Skripty jsou idempotentní (`mkdir -p` před `cp`), takže fungují jak lokálně, tak v CI na čistém checkoutu.

## Přidání další stránky

1. Vytvoř `public/<slug>.php`
2. Začni soubor:
   ```php
   <?php
   $pageTitle       = 'Název stránky';
   $pageDescription = 'SEO popis.';
   require __DIR__ . '/../includes/header.php';
   ?>
   ```
3. Napiš HTML/PHP obsah (typicky uvnitř `<main>`)
4. Ukonči souborem:
   ```php
   <?php require __DIR__ . '/../includes/footer.php' ?>
   ```
5. (Volitelné) Přidej položku do `$config['nav']` v `includes/config.php`, ať se zobrazí v menu

Stránka je dostupná jako `/<slug>` i `/<slug>.php` díky pretty URL pravidlu v `.htaccess`.

## Nasazení a CI/CD pipeline

Tato sekce popisuje **automatický deployment** pro plain PHP web na sdíleném PHP hostingu (referenčně Blueboard.cz). Cílem je: vývojář pushuje do `main` na GitHubu → web se automaticky aktualizuje.

Pro replikaci na dalších projektech adaptuj specifika hostingu (cesty, ports, autentizace) podle informací níže.

### Architektura

```
   ┌──────────┐  push main  ┌───────────┐  build+push  ┌────────────┐
   │ Lokální  │────────────▶│  GitHub   │─────────────▶│  Hosting   │
   │  vývoj   │             │   repo    │  deploy.yml  │   (Git +   │
   │ (Docker) │             │           │              │    FTP)    │
   └──────────┘             └───────────┘              └────────────┘
```

- **deploy.yml** — push do main → npm build → git push do hosting `production` branch → hosting auto-deploy přes FTP

### Klíčová specifika hostingu (Blueboard, ale platí podobně pro mnoho sdílených hostingů)

1. **Destructive deploy** — hosting po pushi přepíše webroot CELÝM stavem `production` branch. Co není v branch, smaže se.
2. **Subdoména = adresář v rootu** — vytvoření adresáře v rootu hostingu automaticky vytvoří subdoménu se stejným názvem. `new/` → `new.example.cz`. Document root subdomény = ten adresář.
3. **Náš `public/` vs hosting konvence** — projekt má `public/` jako document root (kde leží `index.php`). Hosting má docroot = subdomain folder. Řešení: deploy step **přejmenuje** `public/` → `<subdomain>/` při kopírování do produkční větve.
4. **SSH klíč jen pro Git, ne pro shell** — typické u sdílených hostingů. Git push funguje s deploy key, shell přístup obvykle ne. To nám stačí — deploy je čistě přes git push.

### Komponenty pipeline

#### `.github/workflows/deploy.yml`

Trigger: push do `main` (ignoruje `[skip ci]`) + workflow_dispatch.

Kroky:
1. Checkout source
2. Setup Node + npm ci + npm run build (Tailwind compile, kopie node_modules assetů, optimalizace obrázků)
3. Setup SSH agent s deploy klíčem (secret `PRODUCTION_SSH_KEY`)
4. ssh-keyscan production hostu do known_hosts
5. Git clone hosting repa (`git@<host>:<repo-path>`)
6. `git checkout --orphan production-deploy` (čistá historie každý deploy = předvídatelný)
7. **Dvoukrokový rsync:**
   - Vše kromě `public/` → root produkční větve (includes/, src/, scripts/, package.json, atd.)
   - Source `public/` → `<TARGET_DIR>/` (přejmenování podle subdomény)
8. Commit + `git push origin production-deploy:production --force`
9. **Post-deploy smoke test** — pollování `PRODUCTION_URL` přes curl (6× po 10s, 60s celkem). Vrácené HTTP 200 = OK; jinak workflow selže s explicitní chybovou hláškou. Kontrola probíhá jen při skutečné změně (skip při „žádné změny k deployi").

Excludované adresáře:
- `node_modules/` — server nepotřebuje
- `assets/` — zdrojové obrázky pro build (na produkci je nepotřebujeme, optimalizované kopie jsou v `public/assets/images/`)
- `.git/`, `.github/`, dev soubory (`.vscode/`, `docker-compose.yml`, `README.md`, `devstack.md`)

#### `.github/dependabot.yml`

Automatické PR pro updaty závislostí, sleduje:

- **npm** — `package.json` + `package-lock.json` (Tailwind, Sharp, frontend knihovny)
- **github-actions** — verze akcí ve workflowech (actions/checkout, setup-node, ssh-agent atd.)

Schedule: weekly (pondělí). Limit: 5 otevřených PR per ekosystém. Každý update přijde jako samostatný PR s commit prefixem (`npm:`, `actions:`) a labelem (`dependencies` + `javascript`/`ci`).

PR spustí standardní `deploy.yml` (po merge do main) — update se tedy hned ověří v produkci. Pokud něco rozbije, `git revert` na merge commit + redeploy.

### GitHub Secrets a Variables (per project)

Workflow je **projekt-agnostický** — všechny project-specific hodnoty se nastavují v GitHub UI, není potřeba editovat YAML.

**Secrets** (Settings → Secrets and variables → Actions → Secrets) — citlivé hodnoty, šifrované:

- `PRODUCTION_SSH_KEY` — privátní SSH deploy klíč (bez passphrase, ed25519). Veřejný protějšek je v hosting Git sekci.

**Variables** (Settings → Secrets and variables → Actions → Variables) — non-sensitive konfigurace, viditelná v UI:

- `PRODUCTION_TARGET_DIR` — adresář na produkci, kam se uloží source/public/ (= název docrootu subdomény, např. `new`, `www`)
- `PRODUCTION_GIT_REMOTE` — plný SSH URL hosting Git repa (např. `git@www.example.cz:example.cz`)
- `PRODUCTION_GIT_HOST` — hostname pro ssh-keyscan při deployi (např. `www.example.cz`)
- `PRODUCTION_URL` — veřejná URL produkce pro post-deploy smoke test (např. `https://new.example.cz`)

### Konfigurace pro různá prostředí

`includes/config.php` automaticky detekuje localhost (přes `$_SERVER['SERVER_NAME']`) a zapne `debug` režim. Per-projekt si můžeš logiku rozšířit (například o staging vs produkce, číst z env proměnných apod.).

### `.gitignore` (klíčové)

```
# Závislosti
node_modules/

# Build artefakty (generuje GitHub Actions přes npm run build)
public/assets/css/app.css
public/assets/css/fonts/
src/css/bootstrap-icons.css
public/assets/css/leaflet.css
public/assets/css/images/
public/assets/js/leaflet.js
public/assets/js/lucide.min.js
public/assets/js/rellax.min.js
public/assets/js/glightbox.min.js
public/assets/css/glightbox.min.css
```

### npm build skripty (idempotentní)

`copy-fonts` a `copy-js` v `package.json` musí být **idempotentní** — `mkdir -p target/dir && cp -R src/. target/dir/` pattern. Naivní `cp -r src dest` se chová různě podle toho, jestli `dest` už existuje (na fresh CI checkoutu typicky neexistuje).

### Postup nasazení nového projektu (checklist)

1. **Hosting** — objednat Blueboard (nebo ekvivalent s Git + FTP), aktivovat doménu, vytvořit subdoménu jako adresář v rootu
2. **SSH klíč** — `ssh-keygen -t ed25519 -f deploy_key -N "" -C "github-actions"`
3. **Hosting Git sekce** — přidat `deploy_key.pub`, získat URL master remote
4. **Repo struktura** — projekt s `public/` jako docroot, copy-paste `deploy.yml` a `dependabot.yml` (workflow a Dependabot config jsou projekt-agnostické, není třeba editovat)
5. **GitHub Secrets** — přidat `PRODUCTION_SSH_KEY`
6. **GitHub Variables** — přidat `PRODUCTION_TARGET_DIR`, `PRODUCTION_GIT_REMOTE`, `PRODUCTION_GIT_HOST`, `PRODUCTION_URL`
7. **Konfigurace webu** — uprav `includes/config.php` (title, description, nav)
8. **Bootstrap deploy** — push do main → ověřit Actions → otevřít produkční URL

### Trade-offs a alternativy

- **Force-push do production branch** — orphan branch bez historie. Trade-off: nelze udělat git rollback v rámci hostingu. Rollback se dělá `git revert` v main + redeploy.
- **Build v Actions, ne lokálně commitovaný** — čisté gitové diffy (žádné tisíce řádků generovaného CSS). Trade-off: závislost na Actions pro deploy (lze obejít lokálním buildem + ručním pushem do production branch).
- **Plain PHP místo CMS** — žádná admin editace, vše se mění přes git. Pro statičtější weby výhoda (jednoduchost, žádná údržba CMS). Pokud klient potřebuje samoeditaci, přidej CMS (např. Kirby — viz `kirby-web-starter` šablona).
