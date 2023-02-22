{set $site_name = 'site_name' | config}
{set $site_url = 'site_url' | config}

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" defer></script>
</head>
<body>

    {block 'header'}
        {insert 'file:chunks/header.tpl'}
    {/block}

    {block 'content'}
        {'!PageBlocks'|snippet: [
            'fileElements' => 1
        ]}
    {/block}

    {block 'footer'}
        {insert 'file:chunks/footer.tpl'}
    {/block}

    {block 'modal'}
        {insert 'file:chunks/modals.tpl'}
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