<?php
$res = $modx->resource;
$site_url = $modx->getOption('site_url');
$site_start = $modx->getOption('site_start') ?: 1;
$ids = $modx->getParentIds($res->id, 10, array('context' => $modx->context->key));
$pids = ($res->id != $site_start) ? [$res->id] : [];
foreach($ids as $id) {
    if($res->id != $id) {
        $pids[] = $id;    
    }
}
$pids = array_reverse($pids);
$output = [];
$index = 0;
foreach($pids as $id) {
    if ($id == 0) {
        $id = $modx->getOption('site_start');
    }
    if($res->id != $id) {
        $res = $modx->getObject('modResource', $id);
    }
    
    $uri = $site_url . $res->get('uri');
    if($res->get('uri') == 'index') {
        $uri = $site_url;
    }
    $output[] = '{
        "@type": "ListItem",
        "position": '.++$index.',
        "name": "'.$res->get('pagetitle').'",
        "item": "'.$uri.'"
    }';
}
$wrapper = implode(',', $output);
return '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": ['.$wrapper.']
}
</script>';