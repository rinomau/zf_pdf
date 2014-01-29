<?php

$zf_path = './';
set_include_path($zf_path.PATH_SEPARATOR.get_include_path());
require_once($zf_path.'/Zend/Loader/Autoloader.php');
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Zend_');

$pdf = Zend_Pdf::load('ModuloUnico.pdf');
echo 'array(';
foreach ($pdf->_formFields as $nome => $valore) {
	echo $nome . " => '',\n";
}
echo ');';

