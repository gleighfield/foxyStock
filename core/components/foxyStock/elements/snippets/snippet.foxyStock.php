<?php
/*
	Title: foxyStock
	Description: Uses FoxyCart.com's XML Data Feeds to modify an "inventory" TV.
	Author: Graeme Leighfield gelstudios.co.uk - Credit goes to Bret from Foxycart for the initial Modx Evo release.
*/

$output = '';
$log = '';

if (isset($_POST["FoxyData"])) {
    // DECRYPT YOUR DATA
    // Decrypt the data using your $key
    // First, include the rc4crypt.php file then decrypt the XML
    include $modx->getOption('core_path') . 'components/foxyStock/model/class.rc4crypt.php';
    $FoxyData_encrypted = urldecode($_POST["FoxyData"]);
    $FoxyData_decrypted = rc4crypt::decrypt($key,$FoxyData_encrypted);

    // PARSE YOUR XML
    // We now have a big fat XML that we can do whatever we want with.
    // We'll be using Adam Flynn's XMLParser so we can use the same code for both php4 and php5 http://www.criticaldevelopment.net/xml/doc.php
    // the chunk of code below is figuring that out for you.
    if (PHP_VERSION < 5) {
        include $modx->getOption('core_path') . 'components/foxyStock/model/class.xmlparser_php4.php';
        //Set up the parser object
        $data = new XMLParser($FoxyData_decrypted);
        //Work the magic...
        $data->Parse();
    } else if (PHP_VERSION >= 5) {
        include $modx->getOption('core_path') . 'components/foxyStock/model/class.xmlparser_php5.php';
        //Set up the parser object
        $data = new XMLParser($FoxyData_decrypted);
        //Work the magic...
        $data->Parse();
    }

    // MODIFY THE INVENTORY TV VALUE
    // The XML is now a nice array called $data. Let's have fun. First, loop through the transactions
    if (is_object($data)) {
        foreach ($data->document->transactions[0]->transaction as $transaction) {
            // Then through the products per transaction
            foreach ($transaction->transaction_details[0]->transaction_detail as $detail) {
                // Then get the codes
                if ($detail->product_code != '') {
                    // Set the current code and quantity
                    $code = $detail->product_code[0]->tagData;
                    $log .= "code = $code \n";
                    $quantity = $detail->product_quantity[0]->tagData;
                    $log .= "quantity = $quantity \n";

                    // Lets the ID of the product code TV, and the Inventory TV ID
                    $tvCodeId = $modx->getObject('modTemplateVar', array('name' => $tvCode))->get('id');
                    $inventoryId = $modx->getObject('modTemplateVar', array('name' => $tvInventory))->get('id');
                    $log .= "codeId = $tvCodeId \ninventoryId = $inventoryId \n";

                    //Now lets get our unqiue code to get the doc ID to then update in the loop below
                    $products = $modx->getCollection('modTemplateVarResource', array('value' => $code));

                    // Everything should have a unique code, but just incase, one such case might be a duplicate product listed in multiple categories
                    foreach ($products as $product) {
                        $productId = $product->get('contentid');
                        $inventory = $modx->getObject('modResource', $productId);
                        $value = $inventory->getTVValue($tvInventory) - $quantity;
                        $log .= "new inventory value = $value \n";
                        $inventory->setTVValue($tvInventory, $value);
                        $inventory->save();
                    }
                }
            }
        }
        // Are we satisfied? If so, return "foxy" so these transactions can be marked as delivered.
        $output = "foxy";
    } else {
        // It's not an object, which means something went wrong (like an incorrect key).
        $output = "error: not an object";
    }

} else {
    // If you're here, you didn't receive the FoxyData post, so error out. This ensures that the transactions will still show up on the next datafeed.
    $output = "error: no post data";
}

// WRITE THE RESULTS TO A FILE ON YOUR SERVER
if ($logFile) {
    $spacer = "===============\n";
    $date = date("Y-m-d H:i:s") . "\n";
    $fh = fopen($modx->getOption('base_path') . $logFile, 'a') or die("can't open file");
    fwrite($fh, $spacer);
    fwrite($fh, $log);
    fwrite($fh, $date);
    fwrite($fh, $spacer);
    fwrite($fh, $FoxyData_decrypted);
    fclose($fh);
}

return $output;

return $output;
