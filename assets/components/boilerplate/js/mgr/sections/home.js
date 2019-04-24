Boilerplate.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'boilerplate-panel-home',
            renderTo: 'boilerplate-panel-home-div'
        }]
    });
    Boilerplate.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate.page.Home, MODx.Component);
Ext.reg('boilerplate-page-home', Boilerplate.page.Home);