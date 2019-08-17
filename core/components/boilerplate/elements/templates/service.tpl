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
    {if $_modx->resource.content?}
        <section class="section-content" id="{$_modx->resource.alias}">
            <div class="container">
                <div class="row{if $_modx->resource.alias in ['403','404','503']} align-items-center text-center{/if}"{if $_modx->resource.alias in ['403','404','503']} style="min-height:100vh;"{/if}>
                    <div class="col-12">
                        {$_modx->resource.content}
                    </div>
                </div>
            </div>
        </section>
    {/if}
{/block}