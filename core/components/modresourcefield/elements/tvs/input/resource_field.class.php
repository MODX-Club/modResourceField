<?php
if(!class_exists('modResourceFieldInputRender')) {
    
    class modResourceFieldInputRender extends modTemplateVarInputRender {
        
        
        public function getTemplate(){
            return $this->modx->getOption('core_path').'components/modresourcefield/templates/manager/default/tvs/resource_field/input.tpl';
        }
        
        public function process($value,array $params = array()){
            $tv = $this->modx->controller->getPlaceholder('tv');
            $tv->value = $this->modx->resource->get($tv->name);
            
            $this->setPlaceholder('tv', $tv);
            
            return parent::process($value, $params);
        }
    }
}
return 'modResourceFieldInputRender';