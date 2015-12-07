<div id="tv-input-properties-form{$tv}"></div>
{*literal}

<script type="text/javascript">
// <![CDATA[
var params = {
{/literal}{foreach from=$params key=k item=v name='p'}
 '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last},{/if}
{/foreach}{literal}
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,labelWidth: 150
    ,border: false
    ,items: [{
        xtype: 'textfield'
        ,fieldLabel: _('combo_listempty_text')
        ,description: _('combo_listempty_text_desc')
        ,name: 'inopt_listEmptyText'
        ,id: 'inopt_listEmptyText{/literal}{$tv}{literal}'
        ,value: params['listEmptyText'] || ''
        ,width: 300
        ,listeners: oc
    }]
    ,renderTo: 'tv-input-properties-form{/literal}{$tv}{literal}'
});
// ]]>
</script>
{/literal*}