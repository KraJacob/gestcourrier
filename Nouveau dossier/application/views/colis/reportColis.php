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
 $date="";
 $ref_colis="";
 $nom_dest="";
 $prenom_dest="";
 $description="";
 $data = $this->session->userdata('param');
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
$image1 = base_url()."assets/dist/img/logo.png";
$obj_pdf->AddPage('P','A7');

// set color for background
$obj_pdf->SetFillColor(255, 255, 255);
   
// set cell padding
$obj_pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$obj_pdf->setCellMargins(0,0,0,0);
//$obj_pdf->setCellBorder(0,0,0,0);
//
$txt1 = '
      <b style="font-size:40px;font-family:Castellar;color:blue;">K.F.T</b> '.$obj_pdf->Image($image1,45,0, 20).'<br>
       <b style="font-size:8px;font-family:Tahoma;">Abidjan TEL: 05 27 90 07 / 08 81 27 30 <br>
			 &nbsp;Odiéné TEL: 45 26 55 45 / 05 23 50 84 <br>  <br />
						 ODIENNE - ABIDJAN </b> <br /> <br />
			 <span style="font-size:10px;font-family:Times New Roman;">Date: &nbsp;&nbsp;&nbsp;'.$data["date"].' <br /> N° Courrier: &nbsp;&nbsp;&nbsp;<b style="color:red;">'.$data["ref_colis"].'</b> <br /> Prestation: Envoi de colis <br /><br/></span>
			 <span style="font-size:10px;font-family:Times New Roman;">Nom Client:  &nbsp;&nbsp;&nbsp;'.$data["nom"]." ".$data["prenom"].' <br /><br /> Destinateur: &nbsp;&nbsp;&nbsp;'.$data["nom_dest"]." ".$data["prenom_dest"].' <br /> Contenu: &nbsp;&nbsp;&nbsp;'.$data["contenu"].' <br /> <br /> N.B:<br /><b style="font-size:10px;">Le service décline toute responsabilité après le délai d\'un mois </b> </span>
';

// Vertical alignment

$obj_pdf->MultiCell(60, 60, ''.$txt1, 0, 'J', 1, 0, '', '', true, 0, true, true, 40, 'T');

$obj_pdf->Ln(10);

$obj_pdf->SetX(50);

//Close and output PDF document
$obj_pdf->Output('reçu_envoi_colis.pdf', 'I');
?>

