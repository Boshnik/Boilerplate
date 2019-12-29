{set $address = 'address' | config}
{set $phone = 'phone' | config}
{set $email = ('email' | config) ?: 'emailsender' | config}
<section class="contacts mb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                {'!AjaxForm' | snippet:[
                    'frontend_css' => '',
                    'frontend_js' => '',
                ]}
            </div>
            <div class="col-6">
                {if $address}
                    <span>Адрес:</span>
                    <p>{$address}</p>
                {/if}
                {if $phone}
                    <span>Телефон</span>
                    <a href="tel:{$phone | phone}">{$phone}</a>
                {/if}
                {if $email}
                    <span>Email:</span>
                    <a href="mailto:{$email}">{$email}</a>
                {/if}
                {'!SocialNetworks' | snippet}
            </div>
        </div>
    </div>
</section>