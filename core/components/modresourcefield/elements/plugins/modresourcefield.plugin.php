<?php
$corePath = MODX_CORE_PATH.'components/modresourcefield/';

switch($modx->event->name){


    case 'OnTVInputRenderList':
        if($modx->context->key != 'mgr'){
            return;
        } 
        $modx->lexicon->load('modresourcefield:tvs');
        $modx->event->output($corePath.'elements/tvs/input/');
        break;
    
    
    case 'OnLoadWebDocument':
        /*
            Restore resource values overrided by TVs
        */
        if(
            is_object($modx->resource) 
            AND $modx->resource instanceof modResource
            AND !$modx->resource->getProcessed()
        ){
            if(
                $columns = $modx->getSelectColumns( 'modResource')
                AND $columns = explode(', ', $columns)
            ){
                
                $columns = array_map(function($col){
                    $col = trim($col, '`');
                    return $col;
                }, $columns);
                
                $q = $modx->newQuery('modTemplateVar');
                
                $q->select(array(
                    "name",
                ));
                
                $q->where(array(
                    "name:in" => $columns,
                ));
                
                if(
                    $s = $q->prepare()
                    AND $s->execute()
                ){
                    $resource_columns = array();
                    
                    while($row = $s->fetch(PDO::FETCH_ASSOC)){
                        $resource_columns[] = $row['name'];
                    }
                    
                    if($resource_columns){
                        $modx->resource->_lazy = array_merge($modx->resource->_lazy, $resource_columns);
                        
                        $modx->resource->get($resource_columns);
                    }
                }
            }
        }
        
        break;
}