import sharp from 'sharp';
import { readdirSync, statSync, existsSync, mkdirSync } from 'fs';
import { join, extname } from 'path';

const SRC  = 'assets/images';
const DEST = 'public/assets/images';

const JPEG_QUALITY = 82;
const PNG_QUALITY  = 80;

const supported = new Set(['.jpg', '.jpeg', '.png']);

if (!existsSync(SRC)) {
    console.log(`Zdrojový adresář ${SRC}/ neexistuje, přeskakuji.`);
    process.exit(0);
}

if (!existsSync(DEST)) {
    mkdirSync(DEST, { recursive: true });
}

const files = readdirSync(SRC).filter(f => supported.has(extname(f).toLowerCase()));

if (files.length === 0) {
    console.log(`Žádné obrázky k optimalizaci v ${SRC}/`);
    process.exit(0);
}

let totalBefore = 0;
let totalAfter  = 0;

for (const file of files) {
    const srcPath  = join(SRC, file);
    const destPath = join(DEST, file);
    const ext      = extname(file).toLowerCase();
    const sizeBefore = statSync(srcPath).size;

    const img = sharp(srcPath);

    if (ext === '.png') {
        await img.png({ quality: PNG_QUALITY, compressionLevel: 9 }).toFile(destPath);
    } else {
        await img.jpeg({ quality: JPEG_QUALITY, progressive: true, mozjpeg: true }).toFile(destPath);
    }

    const sizeAfter = statSync(destPath).size;
    const saved     = ((1 - sizeAfter / sizeBefore) * 100).toFixed(1);
    totalBefore += sizeBefore;
    totalAfter  += sizeAfter;
    console.log(`${file.padEnd(36)} ${fmt(sizeBefore)} → ${fmt(sizeAfter)}  (−${saved}%)`);
}

const totalSaved = ((1 - totalAfter / totalBefore) * 100).toFixed(1);
console.log('');
console.log(`Celkem: ${fmt(totalBefore)} → ${fmt(totalAfter)}  (−${totalSaved}%)`);

function fmt(bytes) {
    return bytes >= 1_000_000
        ? `${(bytes / 1_000_000).toFixed(1)} MB`
        : `${(bytes / 1_000).toFixed(0)} kB`;
}
