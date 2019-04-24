<?php

/**
 * The home manager controller for Boilerplate.
 *
 */
class BoilerplateHomeManagerController extends modExtraManagerController
{
    /** @var Boilerplate $Boilerplate */
    public $Boilerplate;


    /**
     *
     */
    public function initialize()
    {
        $this->Boilerplate = $this->modx->getService('Boilerplate', 'Boilerplate', MODX_CORE_PATH . 'components/boilerplate/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['boilerplate:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('boilerplate');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->Boilerplate->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/boilerplate.js');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/misc/combo.js');

        // socials
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/widgets/socials/socials.grid.js');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/widgets/socials/socials.windows.js');
        
        // counters
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/widgets/counters/counters.grid.js');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/widgets/counters/counters.windows.js');
        
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->Boilerplate->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        Boilerplate.config = ' . json_encode($this->Boilerplate->config) . ';
        Boilerplate.config.connector_url = "' . $this->Boilerplate->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "boilerplate-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="boilerplate-panel-home-div"></div>';

        return '';
    }
}