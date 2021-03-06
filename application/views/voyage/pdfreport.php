<?php
 //$this->load->view('tpl/css_files'); 
 $ville = $this->session->userdata("ville");
$data = $this->session->userdata('data_passager');
 $tarif = $data['tarif'];
 $destination = $data['destination'];
 $num_siege = $data['num_siege'];
 $heure_depart = $data['heure_depart'];
 $num_depart = $data['num_depart'];
 $date_depart = $data['date_depart'];

 //var_dump($param);exit();
 if($ville=="ABIDJAN")
 {
  $parcours = "ABIDJAN - $destination";
 }else{
	$parcours = "ODIENE - $destination";
 }
tcpdf();
$obj_pdf = new TCPDF('P', 'mm', array(80,80), true, 'UTF-8', false);
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
$obj_pdf->AddPage();

// set color for background
$obj_pdf->SetFillColor(255, 255, 255);

// set cell padding
$obj_pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$obj_pdf->setCellMargins(0,0,0,0);
//
$txt = '
      <b style="font-size:30px;font-family:Algerian;">K.F.T</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$obj_pdf->Image($image1,45,0, 20).'<br>
       <span style="font-size:6px;font-family:Tahoma;">Abidjan TEL: 05 27 90 07 / 08 81 27 30 <br>
       Odienné TEL: 45 26 55 45 / 05 23 50 84 <br>
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06 29 76 85</span>
	   </p>
	   <span style="text-align:center">	   
	   <b> '.$parcours.' </b>
	  </span>
	   <br><br>		
			<b>
			TARIF :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$tarif.' <br><br>
			
			
			&nbsp;&nbsp;N° SIEGE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;'.$num_siege.'   <br><br>
			&nbsp;&nbsp;DATE DE DEPART :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$date_depart.'   <br><br>
			&nbsp;&nbsp;HEURE DE DEPART :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$heure_depart.'   
		   </b>	  
	   <p style=""> <b>Aucun remboussement après depart du car.</b></p>    
';

$obj_pdf->MultiCell(75,75, ''.$txt, 0, 'J', 1, 0, '', '', true, 0, true, true, 40, 'T');

$obj_pdf->Ln(10);

$obj_pdf->SetX(40);

// ---------------------------------------------------------

//Close and output PDF document
$obj_pdf->Output('ticket.pdf', 'I');
?>
