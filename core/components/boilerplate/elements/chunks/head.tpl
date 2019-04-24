{set $title = $_modx->resource.longtitle ?: $_modx->resource.pagetitle}
{set $description = $_modx->resource.description | replace :' "':' «' | replace :'"':'»'}
{set $page = 'site_url' | config ~ $_modx->resource.uri}

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,shrink-to-fit=no">

<title>{$title} | {'site_name' | config}</title>
<meta name="description" content="{$description}">
<meta name="keywords" content="{'seoPro.keywords' | placeholder}">
<meta name="robots" content="{'seoTab.robotsTag' | placeholder}">

<meta name="csrf-token" content="{$.session['csrf-token']}">

<!-- https://realfavicongenerator.net/ -->
{*<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">*}

<!-- Facebook Open Graph -->
<meta property="og:url" content="{$page}">
<meta property="og:type" content="website">
<meta property="og:title" content="{$title}">
<meta property="og:image" content="">
<meta property="og:description" content="{$description}">
<meta property="og:site_name" content="{'site_name' | config}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@site_account">
<meta name="twitter:creator" content="@individual_account">
<meta name="twitter:url" content="{$page}">
<meta name="twitter:title" content="{$title}">
<meta name="twitter:description" content="{$description}">
<meta name="twitter:image" content="">

<!-- Schema.org -->
<meta itemprop="name" content="{$title}">
<meta itemprop="description" content="{$description}">
<meta itemprop="image" content="">

<!-- dns-prefetch -->
<link href='//fonts.googleapis.com' rel='dns-prefetch'>
<link href='//ajax.googleapis.com' rel='dns-prefetch'>
<link href='//cdn.jsdelivr.net' rel='dns-prefetch'>
<link href='//cdn.polyfill.io' rel='dns-prefetch'>
<link href='//cdnjs.cloudflare.com' rel='dns-prefetch'>
<link href='//unpkg.com/' rel='dns-prefetch'>

<script type="application/ld+json">
{
   "@context": "http://schema.org",
   "@type": "Organization",
   "url": "{$page}",
   "logo": "{'logo' | config}"
}
</script>

<base href="{'site_url' | config}" />