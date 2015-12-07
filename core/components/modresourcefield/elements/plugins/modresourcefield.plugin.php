<?php

if($modx->context->key != 'mgr'){
    return;
} 

$corePath = MODX_CORE_PATH.'components/modresourcefield/';

switch($modx->event->name){

    case 'OnTVInputRenderList':
        $modx->lexicon->load('modresourcefield:tvs');
        $modx->event->output($corePath.'elements/tvs/input/');
        break;
}