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