<!DOCTYPE html>
<html lang="{$.en ? 'en-US' : 'ru-RU'}">
<head>
    {block 'head'}
        {include 'head'}
    {/block}
    {block 'minifyx'}
        {'!MinifyX' | snippet : [
            'minifyCss' => 1,
            'minifyJs' => 1,
            'registerCss' => 'default',
            'registerJs' => 'startup',
            'preHooks' => 'libs.php',
            'hooks' => '',
            'jsTpl' => 'boilerplate_tpl_js' | config,
            'libsCss' => 'bootstrapCss,ajaxFormCss,magnificCss,sweetAlertCss',
            'libsJs' => 'polifillJsCDN,jqueryJsCDN,bootstrapJs,ajaxFormJs,ajaxFormJsInit--inline,lazySizesJs,fontAwesomeJs,magnificJs,sweetAlertJs,cssrelpreloadJs--inline',
            'cssGroups' => '',
            'jsGroups' => '',
            'cssSources' => '',
            'jsSources'  => ''
        ]}
    {/block}
</head>
<body class="{block 'classesBody'}body loading page-{$_modx->resource.id} parent-{$_modx->resource.parent}{/block}">
    
    {* CONTENT *}
    {block 'content'}
        {include 'header'}
        {include 'content'}
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