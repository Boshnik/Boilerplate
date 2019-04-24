<!DOCTYPE html>
<html lang="{$.en ? 'en-US' : 'ru-RU'}">
<head>
    {block 'head'}
        {include 'file:components/boilerplate/elements/chunks/head.tpl'}
    {/block}
    {block 'minifyx'}
        {'!MinifyX' | snippet : [
            'minifyCss' => 1,
            'minifyJs' => 1,
            'registerCss' => 'default',
            'registerJs' => 'startup',
            'preHooks' => 'libs.php',
            'hooks' => '',
            'cssTpl' => 'boilerplate_tpl_css' | config,
            'jsTpl' => 'boilerplate_tpl_js' | config,
            'libsCss' => 'bootstrapCss,ajaxFormCss,magnificCss,sweetAlertCss',
            'libsJs' => 'polifillJsCDN,jqueryJsCDN,ajaxFormJs,ajaxFormJsInit--inline,lazySizesJs,fontAwesomeJs,magnificJs,sweetAlertJs,cssrelpreloadJs--inline',
            'cssGroups' => '',
            'jsGroups' => '',
            'cssSources' => '',
            'jsSources'  => ''
        ]}
    {/block}
</head>
<body class="body page-{$_modx->resource.id} parent-{$_modx->resource.parent}">
    
    
    {* CONTENT *}
    {block 'content'}
    {if $_modx->resource.content?}
        <section class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {$_modx->resource.content}
                    </div>
                </div>
            </div>
        </section>
    {/if}
    {/block}
   

    {if $_modx->user.id == 1}
    <script>
        function Info(totalTime, queries, memory, source) {
            this['Время запросов:'] = totalTime;
            this['Количество запросов:'] = queries;
            this['Используемая память:'] = memory;
            this['Источник:'] = source;
        }
        
        {set $info = $_modx->getInfo('', false)}
        var info = new Info( '{$info.totalTime}', '{$info.queries}', '[^m^]', '{$info.source}' );
        console.table(info);
    </script>
    {/if}
</body>
</html>