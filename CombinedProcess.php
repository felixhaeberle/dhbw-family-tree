<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mein Stammbaum | Projektarbeit DHBW Karlsruhe</title>
    <meta name="author" content="Projektteam DHBW Karlsruhe"  />
    <meta name="year" content="2016" />
</head>
<body>

<?php

libxml_use_internal_errors(true);
function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
	$return = "<br/>\n";
	foreach ($errors as $error) {
        $return .= libxml_display_error($error);
    }
    return $return;
}
$newpath="";
$upload_folder = 'uploads/';
// Existiert eine XML-Datei
if(!$_FILES['upload-xml']['name'] =="0"){

// Das Upload-Verzeichnis

$filename = pathinfo($_FILES['upload-xml']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['upload-xml']['name'], PATHINFO_EXTENSION));

// Überprüfung der Dateigröße
$max_size = 50*1024; //50 KB
if($_FILES['upload-xml']['size'] > $max_size) {
	die("Bitte keine Dateien größer 50kb hochladen");
}

// Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;

// Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) {
	// Falls Datei existiert, hänge eine Zahl an den Dateinamen
	$id = 1;
	do {
		$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
		$id++;
	} while (file_exists($new_path));
}

// Alles okay, verschiebe Datei an neuen Pfad (mit Test-Link)
move_uploaded_file($_FILES['upload-xml']['tmp_name'], $new_path);

$xml = new DOMDocument(); 
$xml->load($new_path); 

if (!$xml->schemaValidate('TreeFormat.xsd')) {
	unlink($new_path);
	$res = libxml_display_errors();
	exit($res);

}else{
	
	
}

}else{
	//Es wurde keine Datei zum Upload ausgeählt, Datei wird aus Textfeldangaben generiert
$firstnames = json_decode($_POST["firstnames"]);
$lastnames = json_decode($_POST["lastnames"]);
$genders =json_decode($_POST["genders"]);
$births = json_decode($_POST["births"]);
$deaths = json_decode($_POST["deaths"]);
$childs = json_decode($_POST["childs"]);
$marriages = json_decode($_POST["marriages"]);

$writer = new XMLWriter(); 
$new_path = $upload_folder.'Generated'.'.xml';
$id=1;
do {
		$new_path = $upload_folder.'Generated'.'_'.$id.'.xml';
		$id++;
	} while (file_exists($new_path));

$writer->openURI($new_path);  
$writer->startDocument('1.0','UTF-8');  
$writer->setIndent(4);   
$writer->writePi('xml-stylesheet', 'type="text/xsl" href="http://dhbw-stammbaum.de/Trees.xsl"');
$Tree = $writer->startElement('Tree');  
	for ($x = 0; $x < sizeof($firstnames); $x++) {
    
		$writer->startElement('Person');  
		
			$writer->writeAttribute('FirstName', $firstnames[$x]);
			$writer->writeAttribute('LastName', $lastnames[$x]);
			$writer->writeAttribute('Gender', $genders[$x]);
			
			$date = new DateTime($births[$x]);
			$writer->writeAttribute('Birthday', $date->format('Y-m-d'));
			
			if($deaths[$x]!=""){
			$date = new DateTime($deaths[$x]);
			$writer->writeAttribute('Death', $date->format('Y-m-d'));
			}
			$writer->writeAttribute('ID', ($x+1));
			if($childs[$x]===-1){
				if($x==0){$writer->writeAttribute('ChildOf', '0');}else{
			$writer->writeAttribute('ChildOf', '');}
			}else{
				$writer->writeAttribute('ChildOf', $childs[$x]);
			}
			if($marriages[$x]===-1){
				$writer->writeAttribute('MarriedTo', '');
			}else{
				$writer->writeAttribute('MarriedTo', $marriages[$x]);
			}
		$writer->endElement();
	} 
   
$writer->endElement();  
$writer->endDocument();   
$writer->flush();

}


$newURL = 'http://dhbw-stammbaum.de/disp.php?file=' . urlencode('./' . $new_path);

echo '<script type="text/javascript">
           window.location = "'.$newURL.'"
      </script>';


?>

</body>
</html>