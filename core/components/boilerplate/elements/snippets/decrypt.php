<?php

$key = md5($modx->uuid);
$input = str_replace(['-', '_'], ['+', '/'], $input);

list($encryptedData, $iv) = explode('::', base64_decode($input), 2);
$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);

if (strpos($decryptedData, '::') !== false) {
    list($data, $timestamp) = explode('::', $decryptedData);
    return (time() > $timestamp) ? '' : $data;
}

return $decryptedData;