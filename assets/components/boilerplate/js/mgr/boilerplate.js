var Boilerplate = function (config) {
    config = config || {};
    Boilerplate.superclass.constructor.call(this, config);
};
Ext.extend(Boilerplate, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('boilerplate', Boilerplate);

Boilerplate = new Boilerplate();