
{*
{extends "element/tv/renders/input/file.tpl"}
<input id="tv{$tv->id}" name="{$tv->id}" type="hidden" value="{$tv_value|escape}" />
*}

<div id="div_tv{$tv->id}"></div>
  

<script type="text/javascript">
// <![CDATA[
    Ext.onReady(function() {
        MODx.load({
            xtype: 'textfield'
            ,renderTo: 'div_tv{$tv->id}'
            ,name: '{$tv->name}'
            ,value: '{$tv->value}'
            //,id: 'tv{$tv->id}'
            // ,tv: 'tv{$tv->id}'
        });
    });
// ]]>
 

</script>