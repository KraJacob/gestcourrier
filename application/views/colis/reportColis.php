<?php
 //$this->load->view('tpl/css_files'); 
 /*$ville = $this->session->userdata("ville");
 $parcours;
 $param = $this->input->get("param");
 $param = explode(',',$param);
 $destination = $param[0];
 $tarif = $param[1];
 $num_siege = $param[2];
 $heure_depart = $param[3];
 //var_dump($param);exit();
 if($ville=="ABIDJAN")
 {
  $parcours = "ABIDJAN - $destination";
 }else{
	$parcours = "ODIENE - $destination";
 }  */
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report"; 
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();

// set color for background
$obj_pdf->SetFillColor(255, 255, 255);
   
// set cell padding
$obj_pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$obj_pdf->setCellMargins(0,0,0,0);
//$obj_pdf->setCellBorder(0,0,0,0);
//
$txt1 = '
      <b style="font-size:30px;font-family:Algerian;">K.F.T</b> <img src=\'base_url()."assets/dist/imgs_pdf/v1.png"\'><br>
       <span style="font-size:6px;font-family:Tahoma;">Abidjan TEL: 05 27 90 07 / 08 81 27 30 <br>
       &nbsp;Odiéné TEL: 45 26 55 45 / 05 23 50 84 <br> 
';
$txt2='<b style="font-size:20px;font-family:Algerian;">SERVICE CONSIGNE</b> <br /><br />
	ABIDJAN - ODIENNE <br />
	ODIENNE - ABIDJAN		 
';
$txt3='N.B <br />
 N° 0001701
';

$txt4 = '<p></p></p> <span style="font-size:12px;font-family:Algerian;">Date:  <br /><br /> N° Courrier: <br /><br /> Prestation: <br /><br/></span> ';

$txt5 = '<p></p></p> <span style="font-size:12px;font-family:Algerian;">Nom Client: <br /><br /> Destinateur: <br /><br /> OBJETS: <br /> <br /> N.B: Leservice décline toute responsabilité après le délai d\'un mois</span>';
/*'
	 
  */
// Vertical alignment
$obj_pdf->MultiCell(45, 30, ''.$txt1, 1, 'J', 1, 0, '', '', true, 0, true, true, 40, 'T');
$obj_pdf->MultiCell(105, 30, ''.$txt2, 1, 'J', 1, 0, '', '', true, 0, true, true, 40, 'M');
$obj_pdf->MultiCell(60, 30, ''.$txt3, 1, 'J', 1, 1, '', '', true, 0, true, true, 40, 'B');

$obj_pdf->MultiCell(75, 50, ''.$txt4, 1, 'J', 1, 0, '', '', true, 0, true, true, 40, 'T');
$obj_pdf->MultiCell(10, 50, '', 1, 'J', 1, 0, '', '', true, 0, true, true, 40, 'M');
$obj_pdf->MultiCell(130, 50, ''.$txt5, 1, 'J', 1, 1, '', '', true, 0, true, true, 40, 'B');

// move pointer to last page
$obj_pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$obj_pdf->Output('example_005.pdf', 'I');
?>
