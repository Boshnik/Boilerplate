<?php

namespace Boshnik\Boilerplate\Events;

/**
 * class OnManagerPageInit
 */
class OnManagerPageInit extends Event
{
    public function run()
    {
        $managerCss = 'components/boilerplate/css/mgr/manager.css';
        if (file_exists(MODX_ASSETS_PATH . $managerCss)) {
            $this->modx->regClientCSS('/assets/'.$managerCss);
        }

        // Hide vertical tab for tv
        $tabs = $this->modx->getObject(\modSystemSetting::class, ['key' => 'boilerplate_hide_vtabs_tv']);
        if ($tabs && $tabs->value) {
            $this->modx->regClientCSS('<style>#modx-resource-vtabs-header {display: none !important;}</style>');
        }

        // Hide component descriptions in the menu
        $menu = $this->modx->getObject(\modSystemSetting::class, ['key' => 'boilerplate_menu_description']);
        if ($menu && $menu->value) {
            $this->modx->regClientCSS('<style>#modx-navbar #limenu-components ul.modx-subnav li a span {display: none}</style>');
        }
    }
}