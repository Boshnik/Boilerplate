<?php

$key = md5($modx->uuid);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

if ($iv === false) {
    return 'Error generating IV';
}

$expiration = $expiration ?? 0;
$timestamp = $expiration > 0 ? time() + $expiration : null;

if (is_array($input)) {
    $input = json_encode($input);
}

$input .= $timestamp ? '::' . $timestamp : '';

$encryptedData = openssl_encrypt($input, 'aes-256-cbc', $key, 0, $iv);
$base64EncryptedData = base64_encode($encryptedData . '::' . $iv);

return str_replace('/', '_', $base64EncryptedData);