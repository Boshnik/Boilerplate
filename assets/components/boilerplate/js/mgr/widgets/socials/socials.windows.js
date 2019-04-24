Boilerplate.window.CreateSocial = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'boilerplate-social-window-create';
    }
    Ext.applyIf(config, {
        title: _('boilerplate_social_create'),
        width: 550,
        autoHeight: true,
        url: Boilerplate.config.connector_url,
        action: 'mgr/social/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    Boilerplate.window.CreateSocial.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate.window.CreateSocial, MODx.Window, {

    getFields: function (config) {
        return [
        this.getFieldsName(config),
        {
            xtype: 'textfield',
            fieldLabel: _('boilerplate_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('boilerplate_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    },
    getFieldsName: function(config){
        
        var fieldName = {};
        
        if (!MODx.config['boilerplate_social']) {
                
                return {
                    xtype: 'textfield',
                    fieldLabel: _('boilerplate_item_name'),
                    name: 'name',
                    id: config.id + '-name',
                    anchor: '99%',
                }
               
        } else {
            
            return {
                xtype: 'modx-combo',
                fieldLabel: _('boilerplate_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: false,
                emptyText : '',
                store: JSON.parse(MODx.config['boilerplate_social'] || '{}'),
                fields: ['name','value'],
                valueField: 'name',
                displayField: 'value',
        		hiddenName : 'name',
            }	
            
        }

    }

});
Ext.reg('boilerplate-social-window-create', Boilerplate.window.CreateSocial);


Boilerplate.window.UpdateSocial = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'boilerplate-social-window-update';
    }
    Ext.applyIf(config, {
        title: _('boilerplate_social_update'),
        width: 550,
        autoHeight: true,
        url: Boilerplate.config.connector_url,
        action: 'mgr/social/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    Boilerplate.window.UpdateSocial.superclass.constructor.call(this, config);
};


Ext.extend(Boilerplate.window.UpdateSocial, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, 
        this.getFieldsName(config), 
        {
            xtype: 'textfield',
            fieldLabel: _('boilerplate_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('boilerplate_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    },
    getFieldsName: function(config){
        
        if (!MODx.config['boilerplate_social']) {
                
                return {
                    xtype: 'textfield',
                    fieldLabel: _('boilerplate_item_name'),
                    name: 'name',
                    id: config.id + '-name',
                    anchor: '99%',
                }
               
        } else {
            
            return {
                xtype: 'modx-combo',
                fieldLabel: _('boilerplate_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: true,
                store: JSON.parse(MODx.config['boilerplate_social'] || '{}'),
                fields: ['name','value'],
                valueField: 'name',
                displayField: 'value',
        		hiddenName : 'name',
            }	
            
        }
        
    }

});
Ext.reg('boilerplate-social-window-update', Boilerplate.window.UpdateSocial);