<?php
$zf_path = './';
set_include_path($zf_path.PATH_SEPARATOR.get_include_path());
require_once($zf_path.'/Zend/Loader/Autoloader.php');
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('Zend_');

define("UPLOAD_DIR", "/tmp");
if(isset($_POST['action']) and $_POST['action'] == 'upload')
{
    if(isset($_FILES['user_file']))
    {
        $file = $_FILES['user_file'];
        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
        {
            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.'/'.$file['name']);
        }
    }
} else {
	die('file non caricato');
}

// $filename = 'testo_check_radio_ok.pdf';
$filename = UPLOAD_DIR.'/'.$file['name'];
$pdf = Zend_Pdf::load($filename);
echo 'Elenco dei campi trovati nel file '. $filename .': '. "<br>\n";
?>
<table border="1" cellpadding="2" cellspacing="1">
	<tr>
		<th>Nome</th>
		<th>Tipo</th>
	</tr>
<?php
$lista = 'array(';
foreach ($pdf->_formFields as $nome => $campo) {
	echo '<tr>';
	echo '<td>'.$nome.'</td><td>'.$campo->FT->value.'</td>';
	echo '</tr>';
	$lista .= "'".$nome."' => '',\n";
}
$lista .= ');';
?>
</table>
<p>
<?php echo $lista; ?>
</p>
