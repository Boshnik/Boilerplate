<?php

namespace Boshnik\Boilerplate\Events;

/**
 * class OnWebPagePrerender
 */
class OnWebPagePrerender extends Event
{
    public function run()
    {
        // Remove text/javascript
        $content = str_replace('type="text/javascript"', ' ', $this->modx->resource->_output);

        // Compress output html for Google
        if ($this->modx->getOption('boilerplate_compress_output_html') && $this->modx->resource->get('alias') != 'robots') {
            $content = preg_replace('#\s+#', ' ', $content);
        }

        if (isset($_SESSION['csp_nonce'])) {
            $content = str_replace('<script', '<script nonce="'. $_SESSION['csp_nonce'] .'"', $content);
        }

        $this->modx->resource->_output = $content;
    }
}