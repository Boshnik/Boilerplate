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