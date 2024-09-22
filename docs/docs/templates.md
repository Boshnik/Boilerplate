# Templates

## Base

```html
{set $site_name = 'site_name' | config}
{set $site_url = 'site_url' | config}
{set $locale = $_modx->config.locale|split:'.'}

<!DOCTYPE html>
<html
    lang="{$locale[0]}"
    dir="ltr"
    itemscope
    itemtype="https://schema.org/WebPage"
    prefix="og:http://ogp.me/ns#"
>
<head>
    {block 'head'}
        {insert 'file:chunks/head.tpl'}
    {/block}
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

    {if $_modx->user.id == 1}
        <script>
            function Info(totalTime, queries, memory, source) {
                this['Request times:'] = totalTime;
                this['Number of requests:'] = queries;
                this['Used memory:'] = memory;
                this['Source:'] = source;
            }

            {set $info = $_modx->getInfo('', false)}
            var info = new Info( '{$info.totalTime}', '{$info.queries}', '[^m^]', '{$info.source}' );
            console.table(info);
        </script>
    {/if}
</body>
</html>
```

## Content

```html
{extends 'file:templates/base.tpl'}

{block 'content'}
   {if $_modx->resource.content?}
        <section class="content h-100">
            <div class="container h-100">
                <div class="row h-100{if $_modx->resource.alias == '404'} align-items-center text-center{/if}">
                    <div class="col-12">
                        {$_modx->resource.content}
                    </div>
                </div>
            </div>
        </section>
    {/if}
{/block}
```


## Service

```html
{extends 'file:templates/base.tpl'}

{block 'content'}
   {if $_modx->resource.content?}
        <section class="content h-100">
            <div class="container h-100">
                <div class="row h-100{if $_modx->resource.alias == '404'} align-items-center text-center{/if}">
                    <div class="col-12">
                        {$_modx->resource.content}
                    </div>
                </div>
            </div>
        </section>
    {/if}
{/block}
```