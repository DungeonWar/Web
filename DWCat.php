<?php

require_once ('vendor/autoload.php');

use \Statickidz\GoogleTranslate;

$source = 'es';
$target = 'ca';
$text = readfile('https://dungeonwar.es/index.php');
$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $text);

echo $result;
//echo $text;

/*try {
    $translate = new TranslateClient([
        'keyFilePath' => getcwd(). '/beaming-grid-2'
    ])
} catch (\Throwable $th) {
    //throw $th;
}*/
//echo GoogleTranslate::staticTranslate('hello world', "en", "es"). "\n";

?>