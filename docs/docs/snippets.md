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

For encrypting a string or array with the option to set an expiration date.

### Parameters
 - **input**  - String or array for encryption.
 - **expiration** - Expiration time in seconds.

```php
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

For decrypting a string. If decryption fails or the expiration time has passed, an empty string is returned.

### Parameters
 - **input** - encrypted string

```php
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
```

### Example

```html
{set $input = 'hi@boshnik.com'}
{set $alias = 'Encrypt'|snippet: [
    'input' => $input, 
    'expiration' => '3600'
]}

Output: {$alias} // VkdOYkpLMGxPaFdVUmpBWmFSWkRic0srMHE4MlFqSmk0VFlFajJMWFRCZz06OjRlmRwsKwO5dHQikkoQ74U

// Decrypt
{set $result = 'Decrypt'|snippet: [
    'input' => $alias
]};
Output: {$result} // hi@boshnik.com
```