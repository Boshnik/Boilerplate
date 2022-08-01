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
        if(file_exists(MODX_ASSETS_PATH . $managerCss)) {
            $this->modx->regClientCSS('/assets/'.$managerCss);
        }

        // Hide vertical tab for tv
        $hideVTabsCss = 'components/boilerplate/css/mgr/hidevtabs.css';
        if($this->modx->getOption('boilerplate_hide_vtabs_tv') && file_exists(MODX_ASSETS_PATH . $hideVTabsCss)) {
            $this->modx->regClientCSS('/assets/'.$hideVTabsCss);
        }
    }
}