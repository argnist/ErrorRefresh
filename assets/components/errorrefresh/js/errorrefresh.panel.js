MODx.panel.ErrorRefreshLog = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        buttons: [{
            text: _('clear')
            ,handler: this.clear
            ,scope: this
            ,hidden: MODx.hasEraseErrorLog ? false : true
        },{ text: _('update')
            ,handler: this.update
            ,scope: this
        }]
    });
    MODx.panel.ErrorRefreshLog.superclass.constructor.call(this,config);
    this.setup();
};
console.log(MODx.panel.ErrorRefreshLog, MODx.panel.ErrorLog);
Ext.extend(MODx.panel.ErrorRefreshLog, MODx.panel.ErrorLog,{
    update: function() {
        MODx.Ajax.request({
            url: this.config.url
            ,params: {
                action: 'get'
            }
            ,listeners: {
                'success': {
                    fn:function(r) {
                        this.getForm().setValues(r.object);
                    },scope:this
                }
            }
        });
    }
});
Ext.reg('modx-panel-error-log',MODx.panel.ErrorRefreshLog);