<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r ($date);

require('assets/fpdf/fpdf.php');

$x=$this->input->post("fname");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

//$pdf->Cell(40,10,'Hello World!');
//$pdf->Cell(40,10,$x);


//Header
    // Logo
    $pdf->Image('./uploads/logo.png',10,10,30);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(40);
    // Title
    $pdf->Cell(0,10,'Invoice No:  '.$invoice_no,1,0,'C');
    // Line break
    $pdf->Ln(20);


    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,6,'Address:     Saveen TVS',0,0);
    $pdf->Cell(108);
    
    $pdf->Cell(40,6,'Tel:    077-4200471',0,1);
    
    
    $pdf->Cell(40,6,'                   Aluthgama Road,',0,1);
    $pdf->Cell(40,6,'                   Uragasmanhandiya.',0,1);
    

    $pdf->Cell(40,15,'Invoice No:    '.$invoice_no);
    $pdf->Cell(100);
    
    $pdf->Cell(40,15,'Date:  '.$date,0,1,'C'); 
    $pdf->Cell(0,10,'-------------------------------------------------------------------------------------------------------------------------------------',0,0,'C');
    
        // Line break
    $pdf->Ln(20);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Bike Details',0,1);    
    
    
    
    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(10);
    $pdf->Cell(60,10,'Route Number');
    $pdf->Cell(60,10,': '.$bike[0]->route_no);
    $pdf->Ln(8);
    
    $pdf->Cell(10);
    $pdf->Cell(60,10,'Model');
    $pdf->Cell(60,10,': '.$bike[0]->model);
    $pdf->Ln(8);
    
    $pdf->Cell(10);
    $pdf->Cell(60,10,'Chassis Number');
    $pdf->Cell(60,10,': '.$bike[0]->chassis_no);
    $pdf->Ln(8);
    
    $pdf->Cell(10);
    $pdf->Cell(60,10,'Engine Number');
    $pdf->Cell(60,10,': '.$bike[0]->engine_no);
    $pdf->Ln(8);    
    
    $pdf->Cell(10);
    $pdf->Cell(60,10,'Price');
    $pdf->Cell(60,10,': '.$bike[0]->price);
    $pdf->Ln(8);
    
    
    
    
      $pdf->Ln(20);  
    
    
      
      
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Client Details',0,1);       
      
    
    
    
    
    $pdf->SetFont('Arial','',12);
    
    $pdf->Cell(10);    
    $pdf->Cell(60,10,'First Name');
    $pdf->Cell(60,10,': '.$client[0]->fname);
    $pdf->Ln(8); 
    
    $pdf->Cell(10);    
    $pdf->Cell(60,10,'Last Name');
    $pdf->Cell(60,10,': '.$client[0]->lname);
    $pdf->Ln(8);   
    
    $pdf->Cell(10);    
    $pdf->Cell(60,10,'Address');
    $pdf->Cell(60,10,': '.$client[0]->address);
    $pdf->Ln(8); 
    
    $pdf->Cell(10);    
    $pdf->Cell(60,10,'Telephone Number');
    $pdf->Cell(60,10,': '.$client[0]->tel);
    $pdf->Ln(8); 
     
    
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(10); 
    
    $pdf->Cell(30);    
    $pdf->Cell(30,10,'Total');
    $pdf->Cell(30,10,': '.$bike[0]->price.' /=');
    $pdf->Ln(18);    
    
    
  $pdf->Cell(0,10,'*************************************************************************',0,0,'C');  
    
    
//Footer
    // Position at 1.5 cm from bottom
    $pdf->SetY(250);
    // Arial italic 8
    $pdf->SetFont('Arial','I',12);
    
    $pdf->Cell(0,10,'Thank You! Come again...!',0,1,'C');
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo(),0,0,'C');    
    
    
$pdf->Output();

?>