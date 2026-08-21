<?php

declare(strict_types=1);

/**
 * Generate the browser and responsive variants for the active Medan brand.
 * Run after replacing public/uploads/lanyard-medan-logo.webp or
 * public/uploads/lanyard-medan-favicon.webp.
 */

$publicPath = dirname(__DIR__).'/public';
$uploadPath = $publicPath.'/uploads';
$logoPath = $uploadPath.'/lanyard-medan-logo.webp';
$faviconPath = $uploadPath.'/lanyard-medan-favicon.webp';

if (! function_exists('imagecreatefromwebp') || ! function_exists('imagewebp')) {
    throw new RuntimeException('GD WebP support is required to generate brand assets.');
}

if (! is_file($logoPath) || ! is_file($faviconPath)) {
    throw new RuntimeException('Medan logo and favicon source files must exist first.');
}

function resampleBrandImage(string $sourcePath, int $width, int $height): GdImage
{
    $source = imagecreatefromwebp($sourcePath);
    if ($source === false) {
        throw new RuntimeException("Unable to read {$sourcePath}.");
    }

    $target = imagecreatetruecolor($width, $height);
    imagealphablending($target, false);
    imagesavealpha($target, true);
    imagefill($target, 0, 0, imagecolorallocatealpha($target, 0, 0, 0, 127));
    imagecopyresampled($target, $source, 0, 0, 0, 0, $width, $height, imagesx($source), imagesy($source));
    imagedestroy($source);

    return $target;
}

function writePng(GdImage $image, string $destination): void
{
    imagealphablending($image, false);
    imagesavealpha($image, true);
    if (! imagepng($image, $destination, 9)) {
        throw new RuntimeException("Unable to write {$destination}.");
    }
}

function littleEndianDib(GdImage $image): string
{
    $width = imagesx($image);
    $height = imagesy($image);
    $rowBytes = (int) ceil($width / 32) * 4;
    $pixelBytes = '';
    $maskBytes = '';

    for ($y = $height - 1; $y >= 0; $y--) {
        for ($x = 0; $x < $width; $x++) {
            $rgba = imagecolorat($image, $x, $y);
            $alpha = ($rgba >> 24) & 0x7f;
            $red = ($rgba >> 16) & 0xff;
            $green = ($rgba >> 8) & 0xff;
            $blue = $rgba & 0xff;
            $pixelBytes .= chr($blue).chr($green).chr($red).chr(255 - (int) round($alpha * 255 / 127));
        }
    }

    for ($y = $height - 1; $y >= 0; $y--) {
        $row = '';
        $bits = 0;
        for ($x = 0; $x < $width; $x++) {
            $rgba = imagecolorat($image, $x, $y);
            $alpha = ($rgba >> 24) & 0x7f;
            $bits = ($bits << 1) | ($alpha === 127 ? 1 : 0);
            if (($x + 1) % 8 === 0) {
                $row .= chr($bits);
                $bits = 0;
            }
        }
        if ($width % 8 !== 0) {
            $row .= chr($bits << (8 - ($width % 8)));
        }
        $maskBytes .= str_pad($row, $rowBytes, "\0");
    }

    $header = pack('V3v2V6', 40, $width, $height * 2, 1, 32, 0, strlen($pixelBytes), 0, 0, 0, 0);

    return $header.$pixelBytes.$maskBytes;
}

function writeIco(GdImage $image, string $destination): void
{
    $dib = littleEndianDib($image);
    $directory = pack('v3', 0, 1, 1)
        .pack('CCCCvvVV', imagesx($image), imagesy($image), 0, 0, 1, 32, strlen($dib), 22);

    if (file_put_contents($destination, $directory.$dib) === false) {
        throw new RuntimeException("Unable to write {$destination}.");
    }
}

$logo = resampleBrandImage($logoPath, 500, 122);
foreach ([160, 256] as $width) {
    $height = (int) round(122 * ($width / 500));
    $variant = resampleBrandImage($logoPath, $width, $height);
    imagewebp($variant, $uploadPath."/lanyard-medan-logo-{$width}w.webp", 82);
    imagedestroy($variant);
}
imagedestroy($logo);

$favicon = resampleBrandImage($faviconPath, 1024, 1024);
$faviconVariants = [
    32 => $publicPath.'/favicon-32x32.png',
    96 => $publicPath.'/favicon-96x96.png',
    180 => $publicPath.'/apple-touch-icon.png',
    192 => $publicPath.'/favicon-192x192.png',
    512 => $publicPath.'/favicon-512x512.png',
];

foreach ($faviconVariants as $size => $destination) {
    $variant = resampleBrandImage($faviconPath, $size, $size);
    writePng($variant, $destination);
    if ($size === 32) {
        writeIco($variant, $publicPath.'/favicon.ico');
    }
    imagedestroy($variant);
}

imagedestroy($favicon);

echo "Generated Medan brand assets.\n";
