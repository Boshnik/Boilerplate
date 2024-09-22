# Chunks

## head

```html
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
```

## header

```html
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/" title="{$site_name}">{$site_name}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                {'!pdoMenu' | snippet: [
                    'parents' => '0',
                    'resources' => '',
                    'displayStart' => 1,
                    'level' => 2,
                    'limit' => 0,
                    'tplOuter' => '@INLINE {$wrapper}',
                    'tpl' => '@INLINE <li class="nav-item {$classnames}">
                                <a class="nav-link" href="{$link}" title="{$menutitle}" {$attributes}>{$menutitle}</a>
                            </li>',
                    'tplParentRow' => '@INLINE <li class="nav-item dropdown {$classnames}">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" title="{$menutitle}" {$attributes}>{$menutitle}</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">{$wrapper}</ul>
                                    </li>',
                    'tplInnerRow' => '@INLINE <a class="dropdown-item" href="{$link}" title="{$menutitle}" {$attributes}>{$menutitle}</a>'                
                ]}
            </ul>
        </div>
    </div>
</nav>
```

## breadcrumbs

```html
{if $_modx->resource.parent}
<section class="crumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                  {'!pdoCrumbs' | snippet : [
                    'showHome' => 1,
                    'exclude' => '',
                    'scheme' => 'abs',
                    'outputSeparator' => '',
                    'tplWrapper' => '@INLINE <ol class="breadcrumb">{$output}</ol>',
                    'tpl' => '@INLINE <li class="breadcrumb-item"><a href="{$site_url}{$link}" title="{$menutitle}">{$menutitle}</a></li>',
                    'tplCurrent' => '@INLINE <li class="breadcrumb-item active" aria-current="page">{$menutitle}</li>'
                ]}
                </nav>
            </div>
        </div>
    </div>
</section>
{/if}
```

## footer

```html
<footer class="footer bg-dark text-white">
    <div class="footer-copyright text-center py-3">&copy; {'' | date: 'Y'} Copyright:
        <a href="{$site_url}" title="{$site_name}">{$site_name}</a>
    </div>
</footer>
```