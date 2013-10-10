<?php
$chunks = array();
$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'foxyStock_form',
    'description' => 'Alter this to suit your needs. Important required field is the "CODE" attribute which must point to your foxyStock_code TV.',
    'snippet' => getSnippetContent($sources['elements'].'chunks/chunk.foxyStock_form.php'),
),'',true,true);
return $chunks;