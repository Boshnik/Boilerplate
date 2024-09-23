<?php

$key = md5($modx->uuid);
$input = str_replace('_', '/', $input);

list($encryptedData, $iv) = explode('::', base64_decode($input), 2);
$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);

if (strpos($decryptedData, '::') !== false) {
    $parts = explode('::', $decryptedData);
    if (count($parts) === 2) {
        list($data, $timestamp) = $parts;
        if (time() > $timestamp) {
            return '';
        }
    }
    $data = $parts[0];
} else {
    $data = $decryptedData;
}

$decodedData = json_decode($data, true);

return (json_last_error() === JSON_ERROR_NONE) ? $decodedData : $data;