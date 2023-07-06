{set $page = $site_url ~ $_modx->resource.uri}
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5,shrink-to-fit=no">
{'ss_meta' | placeholder}

{* https://realfavicongenerator.net/ *}
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<meta itemprop="name" content="{$_modx->resource.pagetitle}">
<meta itemprop="description" content="{$_modx->resource.description}">
<meta itemprop="image" content="">

<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "Organization",
   "url": "{$page}",
   "logo": "{$logo}"
}
</script>

<base href="{$site_url}" />