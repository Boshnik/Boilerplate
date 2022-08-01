{set $site_name = 'site_name' | config}
{set $site_url = 'site_url' | config}
{set $logo = 'logo' | config}

<!DOCTYPE html>
<html
    lang="en-US"
    dir="ltr"
    itemscope
    itemtype="https://schema.org/WebPage"
    prefix="og:http://ogp.me/ns#"
>
<head>
    {block 'head'}
        {include 'head'}
    {/block}

    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
    {* CONTENT *}
    {block 'content'}
        {include 'header'}
        {include 'breadcrumbs'}
        {include 'content'}
        {include 'footer'}
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