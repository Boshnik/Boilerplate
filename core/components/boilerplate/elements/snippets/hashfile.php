<?php
/** @var modX $modx */

/** @var string */
$cacheKey = 'boilerplate_';

/** @var array */
$cacheOptions = [
    xPDO::OPT_CACHE_KEY => 'boilerplate',
];

/** @var string $input */
$originalFile = MODX_BASE_PATH . trim($input, '/');
if (!file_exists($originalFile)) {
    return $input;
}

$fileinfo = new SplFileInfo($originalFile);
$extension = strtolower($fileinfo->getExtension());
$filename = strtolower($fileinfo->getFilename());
$name = strtolower($fileinfo->getBasename('.' . $extension));
$filemtime = filemtime($originalFile);

$cache = $modx->getCacheManager();

/** @var string $options */
$cacheDir = MODX_ASSETS_PATH . (isset($options) ? $options : 'components/boilerplate/cache') . '/';
$cacheDir = str_replace('//', '/', $cacheDir);


// Delete old file
$lastFilemTime = $modx->cacheManager->get($cacheKey . $filename, $cacheOptions);
if ($lastFilemTime && $lastFilemTime < $filemtime) {
    $modx->cacheManager->delete($cacheKey . $filename);
    $oldFile = $cacheDir . $name . '_' . $lastFilemTime . '.' . $extension;
    if (file_exists($oldFile)) {
        unlink($oldFile);
    }
}

// Set new file
$hashFile = $cacheDir . $name . '_' . $filemtime . '.' . $extension;
if (!file_exists($hashFile)) {
    $modx->cacheManager->set($cacheKey . $filename, $filemtime, 0, $cacheOptions);
    $cache->copyFile($originalFile, $hashFile);
}

return '/' . str_replace(MODX_BASE_PATH, '', $hashFile);