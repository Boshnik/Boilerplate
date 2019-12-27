<?php
// https://netpeak.net/ru/blog/tegi-alternate-hreflang-media-type-zachem-i-kak-ikh-ispol-zovat/
$ctxDefault = $modx->getOption('x-default', $scriptProperties, 'web', true);
$tplDefault = '<link rel="alternate" href="{$page}" hreflang="x-default"/>';
$tpl = '<link rel="alternate" href="{$page}" hreflang="{$lang}"/>';
$output = '';
$contexts = $modx->getCollection('modContext', array('key:!=' => 'mgr'));
if(!count($contexts)) return;
foreach($contexts as $context) {
    $ctx = $modx->getContext($context->key);
    $site_url = $ctx->getOption('site_url');
    $site_start = $ctx->getOption('site_start');
    if($modx->resource->id != $site_start) {
        $site_url .= $modx->resource->uri; 
    }
    $cultureKey = $ctx->getOption('cultureKey');
    if($context->key == $ctxDefault) {
        $parseTpl = str_replace('{$page}', $site_url, $tplDefault);
        $output .= $parseTpl;
    }
	$parseTpl = str_replace('{$page}', $site_url, $tpl);
	$parseTpl = str_replace('{$lang}', $cultureKey, $parseTpl);
	$output .= $parseTpl;
}
return $output;