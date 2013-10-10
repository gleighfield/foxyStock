<?php
$properties = array(
    array(
        'name' => 'key',
        'desc' => 'Unique Datafeed key obtained from FoxyCart',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'foxyStock:properties',
    ),
    array(
        'name' => 'logFile',
        'desc' => 'Location of logFile, if you do not want logging, pass a blank call to this',
        'type' => 'textfield',
        'options' => '',
        'value' => 'assets/foxyStock.log',
        'lexicon' => 'foxyStock:properties',
    ),
    array(
        'name' => 'tvCode',
        'desc' => 'Name of the TV used for holding the unique product code',
        'type' => 'textfield',
        'options' => '',
        'value' => 'foxyStock_code',
        'lexicon' => 'foxyStock:properties',
    ),
    array(
        'name' => 'tvInventory',
        'desc' => 'Name of the TV used for holding the inventory',
        'type' => 'textfield',
        'options' => '',
        'value' => 'foxyStock_inventory',
        'lexicon' => 'foxyStock:properties',
    ),
);
return $properties;