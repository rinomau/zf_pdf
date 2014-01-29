<?php
$zf_path = './';
set_include_path($zf_path.PATH_SEPARATOR.get_include_path());
require_once($zf_path.'/Zend/Loader/Autoloader.php');
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Zend_');

/*
$pdf = Zend_Pdf::load('test2.pdf');
$pdf->setTextField('nato', 'Udine');
$pdf->setTextField('data', '18/01/1972');
$pdf->setTextField('nome', 'Rinomau');
$pdf->save('outputfile.pdf');
*/

// Carico il file pdf con i campi modulo
$pdf = Zend_Pdf::load('testo_check_radio_ok.pdf');
// Popolo i campi modulo
$pdf->setTextField('testo', 'Ciao mamma');
$pdf->setCheckField('check', True);
$pdf->setRadioField('radio', 2);
// Salvo il file
$pdf->save('outputfile_testo_check_radio_ok.pdf');

?>
