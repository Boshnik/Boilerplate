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
        {insert 'file:chunks/head.tpl'}
    {/block}

    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    {block 'header'}
        {insert 'file:chunks/header.tpl'}
    {/block}

    {block 'content'}
        {insert 'file:chunks/breadcrumbs.tpl'}
        {set $pageblocks = '!pdoResources' | snippet: [
            'loadModels' => 'PageBlocks',
            'class' => 'pbBlockValue',
            'sortby' => 'colrank',
            'sortdir' => 'asc',
            'limit' => 0,
            'where' => [
                'resource_id' => $_modx->resource.id,
                'published' => 1,
                'deleted' => 0,
            ],
            'return' => 'json'
        ] | fromJSON}

        {foreach $pageblocks as $idx => $row}
            {set $row.values['block_id'] = $row.id}
            {set $row.values['idx'] = $idx}
            {$_modx->getChunk('@FILE chunks/'~$row.chunk~'.tpl', $row.values)}
        {/foreach}
    {/block}

    {block 'footer'}
        {insert 'file:chunks/footer.tpl'}
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