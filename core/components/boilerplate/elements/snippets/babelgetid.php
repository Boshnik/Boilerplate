<?php
$tv = $modx->getObject(modTemplateVarResource::class, [
    'tmplvarid' => 1,
    'contentid' => $input,
]);
if (!$tv) return $input;

$value = explode(';', $tv->value);
foreach ($value as $v) {
    $v = explode(':', $v);
    if ($v[0] == $modx->resource->context_key) {
        $input = $v[1];
    }
}

return $input;