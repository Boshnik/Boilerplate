<?php
$fenom->addModifier('toFilter', function ($input) {
    $ms2 = $this->modx->getOption('ms2_product_extra_fields');
    $where = [];
    if(is_array($input)) {
        foreach($input as $key => $field) {
            if(!empty($ms2) && strripos($ms2, $key) !== false) {
                $key = "Data.$key";
            }
            
            $where[$key] = "$field";
            
        }
    } else {
        $where = $input;
    }
    
    return json_encode($where);
});