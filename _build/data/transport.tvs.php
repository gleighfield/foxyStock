<?php

$tvs = array();
$tvs[1]= $modx->newObject('modTemplateVar');
$tvs[1]->fromArray(array(
    'id'                => 1,
    'name'              => 'foxyStock_code',
    'caption'           => 'Unique Product Code',
    'description'       => 'Keep alpha numeric, with no spaces. i.e PC_MyProductCode',
    'default_text'      => 'PC_',
    'type'              => 'text',
),'',true,true);

$tvs[2]= $modx->newObject('modTemplateVar');
$tvs[2]->fromArray(array(
    'id'                => 1,
    'name'              => 'foxyStock_inventory',
    'caption'           => 'Inventory',
    'description'       => 'Stock level, number',
    'default_text'      => '100',
    'type'              => 'number',
),'',true,true);

unset($properties);
return $tvs;