{set $site_url = 'site_url' | config}
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