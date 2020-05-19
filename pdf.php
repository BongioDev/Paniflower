<?php

//////////////////////
//pdf geeft alleen waarde als er op nr word gesorteerd en uitgeprint
//////////////////////


include 'navbar.php';
include 'db.php';

$id = $_GET['id'];

$query = "SELECT
*,
order_paniflower.id AS id,
opdrachtgever.naam AS opdrachtgever,
opdrachtgever.laadplaats AS laadplaats,
klant.naam AS klant,
klant.losplaats AS losplaats,
product.naam AS product,
product.artikelnr AS artikelnr,
eenheid.naam AS eenheid,
chauffeur.naam AS chauffeur
FROM
`order_paniflower`
JOIN opdrachtgever ON order_paniflower.opdrachtgever_id = opdrachtgever.id
JOIN klant ON order_paniflower.klant_id = klant.id
JOIN product ON order_paniflower.product_id = product.id
JOIN eenheid ON order_paniflower.eenheid_id = eenheid.id
JOIN chauffeur ON order_paniflower.chauffeur_id = chauffeur.id
WHERE
order_paniflower.id = $id";


$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

//hier begint PDF
ob_end_clean();
// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aleko Bongiovanni');
$pdf->SetTitle('Opdracht vervoer');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE. ' Nr. ' . $id, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
// set some text to print
$html = <<<EOD
<br>
<h1 style="text-align: center">Opdracht vervoer</h1>
<br>
<p style=""><b>Opdrachtgever: </b>$result[opdrachtgever]</p>
<br>
<p style=""><b>Laadplaats: </b>$result[laadplaats]</p>
<br>
<p style=""><b>Laad datum + uur: </b>$result[laad_datum_uur]</p>
<br>
<p style=""><b>Opmerking laden: </b>$result[opmerking_laden]</p>
<br>
<p style=""><b>Artikel: </b>$result[artikelnr] - $result[product]</p>
<br>
<p style=""><b>kwantum: </b>$result[kwantum] - $result[eenheid]</p>
<br>
<p style=""><b>Klant: </b>$result[klant]</p>
<br>
<p style=""><b>Losplaats: </b>$result[losplaats]</p>
<br>
<p style=""><b>Los datum + uur: </b>$result[los_datum_uur]</p>
<br>
<p style=""><b>Opmerking lossen: </b>$result[opmerking_lossen]</p>
<br>
<p style=""><b>Chauffeur: </b>$result[chauffeur]</p>
<br>
<p style=""><b>Extra opmerking: </b>$result[extra_opmerking]</p>
EOD;

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



?>