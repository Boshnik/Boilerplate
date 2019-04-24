Boilerplate.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'boilerplate-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('boilerplate') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('boilerplate_social'),
                layout: 'anchor',
                items: [{
                    html: _('boilerplate_social_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'boilerplate-grid-socials',
                    cls: 'main-wrapper',
                }]
            },{
                title: _('boilerplate_counters'),
                layout: 'anchor',
                items: [{
                    html: _('boilerplate_counter_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'boilerplate-grid-counters',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    Boilerplate.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate.panel.Home, MODx.Panel);
Ext.reg('boilerplate-panel-home', Boilerplate.panel.Home);
