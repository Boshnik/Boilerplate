{extends 'template:BaseTemplate'}
{block 'minifyx'}
    {'!MinifyX' | snippet : [
        'minifyCss' => 1,
        'minifyJs' => 1,
        'registerCss' => 'default',
        'registerJs' => 'startup',
        'preHooks' => 'libs.php',
        'hooks' => '',
        'jsTpl' => 'boilerplate_tpl_js' | config,
        'libsCss' => 'bootstrapCss',
        'libsJs' => '',
        'cssGroups' => '',
        'jsGroups' => '',
        'cssSources' => '',
        'jsSources'  => ''
    ]}
{/block}

{block 'content'}
   {include 'header'}
   {include 'breadcrumbs'}
   {if $_modx->resource.content?}
        <section class="content">
            <div class="container">
                <div class="row{if $_modx->resource.alias in ['403','404','503']} align-items-center text-center{/if}">
                    <div class="col-12">
                        {$_modx->resource.content}
                    </div>
                </div>
            </div>
        </section>
    {/if}
    {include 'footer'}
{/block}