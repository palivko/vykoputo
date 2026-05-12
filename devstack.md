# Vykopu.to — vývojová dokumentace

Technický stack, vývojový workflow a nasazení webu vykopu.to.

---

## Technologie

- **Plain PHP 8.3** — žádný framework, žádný CMS; šablony s `require` includes
- **PHP** v Docker image `webdevops/php-apache:8.3` (Apache + PHP-FPM)
- **Tailwind CSS 3.x** kompilovaná přes npm
- **Node.js 24+**
- **Sharp** pro optimalizaci obrázků (build step)
- **npm assety:** bootstrap-icons, glightbox, leaflet, lucide, rellax
- **Docker + Docker Compose** pro lokální vývoj
- **GitHub Actions** pro CI/CD

---

## Struktura projektu

```
public/                   ← document root
  index.php               ← onepage homepage (jediná stránka)
  robots.txt              ← crawling pravidla
  sitemap.xml             ← sitemap pro Google Search Console
  .htaccess               ← HTTPS, gzip, cache, security headers
  assets/
    images/               ← loga a favicona (SVG, commitováno)
                             + optimalizované fotky (generuje Sharp, commitováno)
    css/                  ← build artefakty (gitignored)
    js/                   ← build artefakty (gitignored)

includes/
  config.php              ← title, description, kontakt, anchor nav
  header.php              ← <head> + OG tagy + fixní navigace + hamburger JS
  footer.php              ← patička + Lucide init
  form.php                ← zpracování kontaktního formuláře (PHP mail)

src/css/app.css           ← Tailwind zdroj (@import bootstrap-icons + direktivy)
assets/images/            ← zdrojové fotky (jpg/png) → Sharp → public/assets/images/
tailwind.config.js        ← brand paleta ink/cream/clay/stone + fonty Archivo + Inter
docker-compose.yml        ← lokální dev prostředí
scripts/optimize-images.mjs ← Sharp optimalizace obrázků
package.json              ← npm závislosti + build skripty
```

---

## Coding rules

- Sémantické HTML, správná struktura nadpisů
- CSS pouze přes Tailwind utility třídy a `@layer components` v `app.css`
- Žádné inline CSS (výjimka: `background-image` s dynamickými url — nelze jinak v Tailwindu v3)
- Dynamický/uživatelský text vždy escapovat helperem `h()` z `includes/config.php`
- Fonty: **Archivo** (display, headings) + **Inter** (body, UI) — Google Fonts v `<head>`

---

## Lokální vývoj

```bash
docker compose up         # web na http://localhost:8080
npm install               # první run
npm run dev               # Tailwind watch mode (rebuild při uložení)
npm run build             # produkční build
```

`npm run build` provede:
1. `copy-fonts` — bootstrap-icons fonty → `public/assets/css/fonts/`
2. `copy-js` — JS knihovny → `public/assets/js/`
3. `optimize-images` — `assets/images/` → Sharp → `public/assets/images/`
4. `build-css` — Tailwind → `public/assets/css/app.css` (minified)

---

## Přidání obrázků

1. Zdrojový soubor (jpg/png) vlož do `assets/images/`
2. Spusť `npm run build` nebo samotné `npm run optimize-images`
3. Sharp vytvoří optimalizovanou kopii v `public/assets/images/`
4. V HTML odkazuj na `/assets/images/<soubor>` (vždy z `public/`)

SVG soubory (loga, favicona) dávej přímo do `public/assets/images/` — Sharp je nezpracovává.

---

## Kontaktní formulář

Zpracování je v `includes/form.php`. Odeslání přes PHP `mail()`:

- Cíl: `poptavka@vykopu.to` (definováno v `includes/config.php`)
- Spam ochrana: honeypot pole `website` (boti ho vyplní, lidé ne)
- Po úspěšném odeslání: redirect na `/?odeslano=1`
- E-mailová schránka musí existovat na Blueboard hostingu

**Ověření funkčnosti:** po nasazení odeslat testovací poptávku a zkontrolovat doručení.

---

## CI/CD pipeline — GitHub Actions

Trigger: push do `main` (ignoruje `[skip ci]`) + workflow_dispatch.

Kroky `deploy.yml`:
1. Checkout source
2. Setup Node + `npm ci` + `npm run build`
3. SSH agent s deploy klíčem (`PRODUCTION_SSH_KEY`)
4. ssh-keyscan → known_hosts
5. Git clone hosting repo
6. `git checkout --orphan production-deploy` (čistá větev každý deploy)
7. Rsync: vše kromě `public/` → root; `public/` → `<PRODUCTION_TARGET_DIR>/`
8. Force push → `production` branch → Blueboard auto-deploy
9. Smoke test: curl `PRODUCTION_URL`, 6× po 10 s, očekává HTTP 200

### GitHub Secrets

| Secret | Popis |
|---|---|
| `PRODUCTION_SSH_KEY` | Privátní SSH deploy klíč (ed25519, bez passphrase) |

### GitHub Variables

| Variable | Aktuální hodnota | Popis |
|---|---|---|
| `PRODUCTION_GIT_REMOTE` | `git@vykopu.to:vykopu.to` | SSH URL hosting Git repo |
| `PRODUCTION_GIT_HOST` | `vykopu.to` | Hostname pro ssh-keyscan |
| `PRODUCTION_TARGET_DIR` | `new` → po ostrém spuštění změnit na `www` | Cílový adresář = subdoména |
| `PRODUCTION_URL` | `https://new.vykopu.to` → po přepnutí `https://vykopu.to` | URL pro smoke test |

---

## Specifika Blueboard hostingu

**Subdoména = adresář v rootu.** Vytvoření adresáře `new/` → automaticky vznikne `new.vykopu.to`. `PRODUCTION_TARGET_DIR` určuje, do jakého adresáře se deploy provede.

**Vlastnictví souborů.** Soubory vytvořené Git hookem a soubory nahrané přes FTP mají různé vlastníky. Nikdy nemíchat: vše, co je jednou nasazeno přes GitHub Actions, nesmí být přepsáno FTP uplodem — a naopak. Pokud dojde k chybě `Permission denied` při deployi, příčinou jsou FTP-uploadované soubory. Řešení: smazat confliktní soubory přes FTP a spustit deploy znovu.

**Git deploy klíč** musí mít na Blueboard nastaveno oprávnění pro **zápis** (ne jen čtení).

---

## Přepnutí na produkční doménu

Až klient odsouhlasí web na testovací subdoméně:

1. V GitHub Settings → Variables změnit:
   - `PRODUCTION_TARGET_DIR`: `new` → `www`
   - `PRODUCTION_URL`: `https://new.vykopu.to` → `https://vykopu.to`
2. Push libovolné změny (nebo prázdný commit) → deploy proběhne do `www/`
3. Ověřit na `https://vykopu.to`
4. Odeslat sitemap do Google Search Console

---

## Otevřené body

- [ ] Fotky dokončených zakázek od klienta → sekce Reference (6 slotů)
- [ ] Fotky strojů od klienta (náhrada stock fotek v sekci Technika)
- [ ] OG image 1200×630 px → `assets/images/og-image.jpg`, upravit cestu v `header.php`
- [ ] Otestovat odeslání kontaktního formuláře v produkci
- [ ] Registrovat v Google Search Console + odeslat `sitemap.xml`
- [ ] Přepnout `PRODUCTION_TARGET_DIR` na `www` po odsouhlasení klientem
