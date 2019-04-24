Boilerplate.window.CreateCounter = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'boilerplate-counter-window-create';
    }
    Ext.applyIf(config, {
        title: _('boilerplate_counter_create'),
        width: 550,
        autoHeight: true,
        url: Boilerplate.config.connector_url,
        action: 'mgr/counter/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    Boilerplate.window.CreateCounter.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate.window.CreateCounter, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('boilerplate_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'modx-combo-context',
            fieldLabel: _('boilerplate_item_context'),
            name: 'context',
            id: config.id + '-context',
            allowBlank: false,
            anchor: '99%'
        }, {
            xtype: 'textarea',
            fieldLabel: _('boilerplate_item_content'),
            name: 'content',
            id: config.id + '-content',
            height: 150,
            allowBlank: false,
            anchor: '99%'
        }, {
            xtype: 'modx-combo',
            fieldLabel: _('boilerplate_item_position'),
            name: 'position',
            id: config.id + '-position',
            store: ['Head','Body'],
            allowBlank: false,
            emptyText : '',
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('boilerplate_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('boilerplate-counter-window-create', Boilerplate.window.CreateCounter);


Boilerplate.window.UpdateCounter = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'boilerplate-counter-window-update';
    }
    Ext.applyIf(config, {
        title: _('boilerplate_counter_update'),
        width: 550,
        autoHeight: true,
        url: Boilerplate.config.connector_url,
        action: 'mgr/counter/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    Boilerplate.window.UpdateCounter.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate.window.UpdateCounter, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('boilerplate_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'modx-combo-context',
            fieldLabel: _('boilerplate_item_context'),
            name: 'context',
            id: config.id + '-context',
            allowBlank: false,
            anchor: '99%'
        }, {
            xtype: 'textarea',
            fieldLabel: _('boilerplate_item_content'),
            name: 'content',
            id: config.id + '-content',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'modx-combo',
            fieldLabel: _('boilerplate_item_position'),
            name: 'position',
            id: config.id + '-position',
            store: ['Head','Body'],
            allowBlank: false,
            emptyText : '',
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('boilerplate_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('boilerplate-counter-window-update', Boilerplate.window.UpdateCounter);