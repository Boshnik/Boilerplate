{set $title = ($_modx->resource.longtitle ?: $_modx->resource.pagetitle) | notags}
{set $description = $_modx->resource.description | replace :' "':' «' | replace :'"':'»'}
{set $page = $site_url ~ $_modx->resource.uri}

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,shrink-to-fit=no">

<title>{$title} | {$site_name}</title>
<meta name="description" content="{$description}">
<meta name="keywords" content="{'seoPro.keywords' | placeholder}">
<meta name="robots" content="{'seoTab.robotsTag' | placeholder}">
<meta name="csrf-token" content="{$.session['csrf-token']}">

{'!hreflang' | snippet}

<!-- https://realfavicongenerator.net/ -->
{*<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">*}
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<!-- Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{$page}">
<meta property="og:title" content="{$title}">
<meta property="og:description" content="{$description}">
<meta property="og:image" content="">
<meta property="og:locale" content="{$.en ? 'en_US' : 'ru_RU'}">

<!-- Twitter Card -->
<meta name="twitter:card" content="app">
<meta name="twitter:title" content="{$title}">
<meta name="twitter:description" content="{$description}">
<meta name="twitter:url" content="{$page}">
<meta name="twitter:image" content="">

<!-- Schema.org -->
<meta itemprop="name" content="{$title}">
<meta itemprop="description" content="{$description}">
<meta itemprop="image" content="">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "Organization",
   "url": "{$page}",
   "logo": "{'logo' | config}"
}
</script>

{'!breadSchema' | snippet}
<base href="{$site_url}" />