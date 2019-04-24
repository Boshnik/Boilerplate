<?php
/** @var modX $modx */
/** @var array $scriptProperties */

$tplOuter = $modx->getOption('tplOuter', $scriptProperties, '');
$tpl = $modx->getOption('tpl', $scriptProperties, '');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortdir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 0);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);
$services = $modx->getOption('services', $scriptProperties, '');

// Build query
$c = $modx->newQuery('BoilerplateSocial');
$c->select(array(
    'BoilerplateSocial.id as id',
    'BoilerplateSocial.name as name',
    'BoilerplateSocial.link as link',
    'BoilerplateSocial.active as active',
));
$c->sortby($sortby, $sortdir);
if(empty($services)) {
    $c->where(['active' => 1]);    
} else {
    $c->where(['active' => 1, 'name:IN' => explode(',',$services)]);
}

$c->limit($limit);

$c->prepare();
$c->stmt->execute();
$items = $c->stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = $modx->getService('pdoTools');

// Iterate through items
$list = [];
/** @var SocialNetworksItem $item */
foreach ($items as $item) {
    $list[] = $pdo->parseChunk($tpl, $item);
}

// Output
$output = implode($outputSeparator, $list);
if(!empty($tplOuter)) {
    $output = $pdo->parseChunk($tplOuter, array('wrapper' => $output));    
}
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return '';
}
// By default just return output
return $output;