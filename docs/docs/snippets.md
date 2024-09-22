# Snippets

## csrf

Needed for CSRF TOKEN verification and used as a hook in the FormIt snippet.

```php
<?php
if ($hook->getValue('csrf_token') !== $_SESSION['csrf_token']) {
    $hook->addError('csrf_token', 'CSRF TOKEN ERROR');
}
return !$hook->hasErrors();
```

## babelGetId

Needed to obtain the ID of another resource in the current context when using the Babel component. For example, in a resource with ID 32 (en), you need to get the ID of resource 5 (de) specifically for the current context (en). Instead of 5, the ID of the related resource will be output.

```php
<?php
$name = $modx->getOption('babel.babelTvName', null, 'babelLanguageLinks', true);
$tv = $modx->getObject(modTemplateVar::class, compact('name'));
if (!$tv) return $input;

$tvResource = $modx->getObject(modTemplateVarResource::class, [
    'tmplvarid' => $tv->id,
    'contentid' => $input,
]);
if (!$tvResource) return $input;

$value = explode(';', $tvResource->value);
foreach ($value as $v) {
    $v = explode(':', $v);
    if ($v[0] == $modx->resource->context_key) {
        $input = $v[1];
    }
}

return $input;
```

### Examples

```php
// MODX
[[!babelGetId? &input=`5`]]
// Fenom
{5|babelGetId} 
// or
{'babelGetId'|snippet: ['input' => 5]}
```
## Encrypt

For string encryption with the ability to set an expiration period.

### Parameters
 - **input**  - String for encryption.
 - **expiration** - Expiration period in seconds.

```php
<?php

$key = md5($modx->uuid);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

$timestamp = isset($expiration) ? time() + $expiration : null;
$input .= $timestamp ? '::' . $timestamp : '';

$encryptedData = openssl_encrypt($input, 'aes-256-cbc', $key, 0, $iv);
$base64EncryptedData = base64_encode($encryptedData . '::' . $iv);

return str_replace(['+', '/', '='], ['-', '_', ''], $base64EncryptedData);
```

### Example

Creating a link for email confirmation.

```html
{set $link = $_modx->config.site_url ~ 'confirm/'}
{set $link = $link ~ 'Encrypt'|snippet: [
    'input' => $.post.email, 
    'expiration' => '3600'
]}
<a href="{$link}">{$link}</a>
```

## Decrypt

For decrypting a string. If decryption fails or the expiration period has passed, an empty string is returned.

### Parameters
 - **input** - encrypted string

```php
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
```