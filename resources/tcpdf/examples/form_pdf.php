<?php @session_start();

//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

//include_once('../../config.php');
class MYPDF extends TCPDF {

  //Page header
  // Page footer
  public function Footer() {
    $cur_y = $this->y;
    $this->SetTextColorArray($this->footer_text_color);
    //set style for cell border
    $line_width = (0.85 / $this->k);
    $this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));
    //print document barcode
    $barcode = $this->getBarcode();
    if (!empty($barcode)) {
      $this->Ln($line_width);
      $barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
      $style = array(
        'position' => $this->rtl?'R':'L',
        'align' => $this->rtl?'R':'L',
        'stretch' => false,
        'fitwidth' => true,
        'cellfitalign' => '',
        'border' => false,
        'padding' => 0,
        'fgcolor' => array(0,0,0),
        'bgcolor' => false,
        'text' => false
      );
      $this->write1DBarcode($barcode, 'C128', '', $cur_y + $line_width, '', (($this->footer_margin / 3) - $line_width), 0.3, $style, '');
    }
    $w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
    if (empty($this->pagegroups)) {
      $pagenumtxt = $w_page.$this->getAliasNumPage().' / '.$this->getAliasNbPages();
    } else {
      $pagenumtxt = $w_page.$this->getPageNumGroupAlias().' / '.$this->getPageGroupAlias();
    }
    $this->SetY($cur_y);
     
    //Print page number
    if ($this->getRTL()) {
      $this->SetX($this->original_rMargin);
      $this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
    } else {
      $this->SetX($this->original_lMargin);
      $this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
    }
    //$this->SetY(-15);
    $this->ln(4);
    $this->Cell(0, 0, 'Application Form | Candidates Testing Services', 0, true, 'L', 0, '', 1, false, 'C', 'M');

    
  }
  public function Header() {
  }
  public function Footer22() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    $this->ln(4);
    $this->Cell(0, 0, 'Application Form | Candidates Testing Services', 0, true, 'L', 0, '', 1, false, 'T', 'M');
  }
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 001');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

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
//$pdf->SetFont('dejavusans', '', 14, '', true);
 $pdf->SetFont('times', '', 14, '', true);
//$pdf->SetFont('times', '', 10.5, '', true);    
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
// top header
// Img
//   DATA
$application_form_data = $_SESSION['application_form_data'];
$img = <<<EOD
<img src="candidates_testing_services.png" style="width:150px; color:black;"/>
EOD;
$pdf->writeHTMLCell(0, 0, '5', '15', $img, 0, 1, 0, true, '', true);
// Registration form and reg no #
$top_reg_form = <<<EOD
<h3>Registration Form </h3>   
EOD;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '70', '5', $top_reg_form, 0, 1, 0, true, '', true);
$top_reg_no = 
'<h6>Reg No # '.$application_form_data['form_reg_no'].'</h6>  '; 

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '140', '5', $top_reg_no, 0, 1, 0, true, '', true);
// Image wrapper
$top_img_wrapper = <<<EOD
<table  cellspacing="3" cellpadding="25" border="1px">
 <tr style="padding:5px;height:200px;">
    <td>   Picture<br/><font style="font-size:10px;">Paste Your recent passport size photograph</font></td>
  </tr>
</table>    
EOD;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '150', '15', $top_img_wrapper, 0, 1, 0, true, '', true);
// Test Conducted
$test_conducted = <<<EOD
<h5 style="margin-left:100px; width:100px;color:white;background-color:gray;">  Test Conducted By CTS</h5>
EOD;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(50,0, '70', '20', $test_conducted, 0, 1, 0, true, '', true);




//
$top_html = '
<h2 style="margin-left:100px;color:dark blue;">'.$application_form_data["dep"].'</h2>
';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '50', '60', $top_html, 0, 1, 0, true, '', true);
// text
$pdf->SetFont('times', '', 12, '', true);
$text = <<<EOD
<p style="font-size:14px;"></p>
EOD;
$pdf->writeHTMLCell(0, 0, '80', '70', $text, 0, 1, 0, true, '', true);

// text

// investor 1
//if($_SESSION['pdf_investor_1'] != '')
   // $investor_detail = $_SESSION['pdf_investor_1']; 
//else
//{
     

      
// investor 2
//if($_SESSION['pdf_investor_2'] != '')
//$investor2_detail = $_SESSION['pdf_investor_2'];
// Bank detail
//if($_SESSION['pdf_bank_detail'] != '')
//$bank = $_SESSION['pdf_bank_detail'];
// Advisor Detail
//if($_SESSION['pdf_advisor_detail'] != '')
//$advisor = $_SESSION['pdf_advisor_detail'];
// Company Detail
//if($_SESSION['pdf_company_detail'] != '')
//$company =  $_SESSION['pdf_company_detail'];
// directors
//if($_SESSION['pdf_company_directors'] != '')
//$director_names = $_SESSION['pdf_company_directors'];
// Trust detail
//$trust = $_SESSION['pdf_trust_detail'];
$html = '
<p></p>
<table cellpadding="3">
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td style="padding:5px;"><b>01. Bank Online Deposit</b> of Rs 500/- from Designated Bank Branches.</td>
</tr>
<tr >
   <td><table border="1px"  cellpadding="3"><tr><td style="width:70px;"> Bank Code </td><td style="width:178px;"></td><td style="width:100px;"> Deposit Date </td><td style="width:180px;"></td></tr></table></td>
</tr>
<tr style="padding:5px;height:20px;font-size:10px;">
   <td>*Note : Application Form will not be entertained without Original Deposit Slip (CTS Copy)</td>
</tr>
<tr >
   <td> </td>
</tr>
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td><b>02. Desired Post: </b><span style="font-size:10px;"> Fill the Box for Desired Post (<b>Mandatory</b>)</span></td>
</tr>

</table>';

//$pdf->writeHTML($html, true, false, true, false, '');
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Check boxess For Desired Posts
$pdf->ln(8);
$Post_data = $application_form_data['posts'];

$counter = 1; $y_axis = '130';

foreach($Post_data as $rec) {

$post1 = '
<table  >
<tr>
   <td style="width:40px;"> '.$counter.' <input type="checkbox" value="0" name="post"></td>
   <td colspan="3"><span style="margin-left:30px;"><b>'.$rec['PostName'].'</b></span></td>
   
</tr>
</table>
';
if($counter == 1)
{
  $x_axiy = '13';
  
}
else
{
   $x_axiy = $x_axiy + 60;
 
}
if($counter == 3)
{
    $counter = 1;
     $y_axis = $y_axis + 30;
}
else
{
     $counter++;
}

$pdf->writeHTMLCell(60, 15, $x_axiy, $y_axis, $post1, 0, 1, 0, true, '', true); 
}


 $pdf->ln(12);
//$pdf->Cell(35, 5, 'Individual Trustee Company Trustee');
// Test City
$text2 = <<<EOD
<table cellpadding="3">
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td><b> 03. Desired Test City: </b><span style="font-size:10px;"> Fill Only One Box (<b>Mandatory</b>)</span></td>
</tr>

</table>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $text2, 0, 1, 0, true, '', true);

// ------------------
$y_axis = $y_axis + 40;
$city1 = <<<EOD
<table  >
<tr>
   <td style="width:40px;"> 1 .<input type="checkbox" value="0" name="post"></td>
   <td colspan="3">Islamabad / Rwp</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 10, '13', $y_axis, $city1, 0, 1, 0, true, '', true);

$city2 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 2 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Lahore</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '65', $y_axis, $city2, 0, 1, 0, true, '', true);

$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 3 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Faisalabad</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '100', $y_axis, $city3, 0, 1, 0, true, '', true);

$city4 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 4 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Multan</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '140', $y_axis, $city4, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 5 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Karachi</td>
   
</tr>
</table>
EOD;
$y_axis = $y_axis + 10;
$pdf->writeHTMLCell(60, 15, '13', $y_axis, $city3, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 6 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Hyderabad</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '65', $y_axis, $city3, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 7 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Sukhur</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '100', $y_axis, $city3, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 8 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Abbottabad</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '140', $y_axis, $city3, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 9 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Peshawar</td>
   
</tr>
</table>
EOD;
$y_axis  = $y_axis + 10;
$pdf->writeHTMLCell(60, 15, '13', $y_axis, $city3, 0, 1, 0, true, '', true);
$city3 = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 10 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Quetta</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '65', $y_axis, $city3, 0, 1, 0, true, '', true);
//----------------

// _________________________________________
//*******************************************
//            Province of Domicile
// Test City
$text2 = <<<EOD
<table cellpadding="3">
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td><b> 04. Province of Domicile: </b><span style="font-size:10px;"> Fill Only One Box for desired province domicile.(<b>Mandatory</b>)</span></td>
</tr>

</table>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $text2, 0, 1, 0, true, '', true);

// ------------------

$province = <<<EOD
<table  >
<tr>
   <td style="width:40px;"> 1 .<input type="checkbox" value="0" name="post"></td>
   <td colspan="3">Punjab <font style="font-size:10px;">(including Federal) </font></td>
   
</tr>
</table>
EOD;
$y_axis = $y_axis + 25;
$pdf->writeHTMLCell(60, 10, '13', $y_axis, $province, 0, 1, 0, true, '', true);

$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 2 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Khyber Pakhtunkhwa</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '80',$y_axis, $province, 0, 1, 0, true, '', true);

$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 3 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Balochistan</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '140', $y_axis, $province, 0, 1, 0, true, '', true);

$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 4 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Sindh (Urban)</td>
   
</tr>
</table>
EOD;
$y_axis = $y_axis + 10;
$pdf->writeHTMLCell(60, 15, '13', $y_axis, $province, 0, 1, 0, true, '', true);
$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 5 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Sindh (Rural)</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '80',$y_axis, $province, 0, 1, 0, true, '', true);
$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 6 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">AJK</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '140', $y_axis, $province, 0, 1, 0, true, '', true);
$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 7 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">Gilgit Bultistan</td>
   
</tr>
</table>
EOD;
$y_axis = $y_axis + 10;
$pdf->writeHTMLCell(60, 15, '13', $y_axis, $province, 0, 1, 0, true, '', true);
$province = <<<EOD
<table >
<tr>
   <td style="width:40px;"> 8 .<input type="checkbox" value="0" name="post2"></td>
   <td colspan="3">FATA</td>
   
</tr>
</table>
EOD;
$pdf->writeHTMLCell(60, 15, '80', $y_axis, $province, 0, 1, 0, true, '', true);

//----------------
//__________________________________________________________
//**********************************************************
//
// _________________________________________
//*******************************************
//            Personal Information
// Test City
$text2 = <<<EOD
<table cellpadding="3">
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td><b>  Personal Information: </b><span style="font-size:10px;">Use CAPITAL letters and leave spaces between words.</span></td>
</tr>

</table>
<p> <b> 05. Name in Full : </b> __________________________________________________________________</p>
<p> <b> 06. Father's Name : </b>   __________________________________________________________________</p>
<p> <b> 07. Candidate CNIC : </b> _______________________________________________________________</p>
<p> <b> 08. Gender : </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input  type="checkbox" name="gender" value="1" /> Male <input type="checkbox" name="gender" value="0" /> Female </p>
<p> <b> 09. Date of Birth : </b>   ___ - ___ - ______ <span style="font-size:10px;">(DD - MM - YY)</span></p>
<p> <b> 10. Postal Address : </b> __________________________________________________________________</p>
<p> _____________________________________________________  <b> City :</b> __________________________ </p>
<p><b> District : </b> _________________________ </p>
<p> <b> 11. Phone No : </b> (OFF) _________________________ (Res) __________________________</p>
<p> (Mobile) ______________________ </p> 
<p> <b> 12. Are you a Government Servant and applying through proper channel ? </b><input type="checkbox" name="gov_servnt" value="1" /> Yes <input type="checkbox" name="gov_servnt" value="0" /> No </p>
<p> <b> 13. Are you a Disabled Person ? </b><input type="checkbox" name="disable_person" value="1" /> Yes <input type="checkbox" name="disable_person" value="0" /> No </p>
<p> <b> 14. Religion : </b><input type="checkbox" name="religion" value="1" /> Muslim <input type="checkbox" name="religion" value="0" /> Non Muslim  <span style="font-size:10p;">,    If Non Muslim Please Specify : _______________</span></p>

EOD;
$pdf->writeHTMLCell(0, 0, '', '', $text2, 0, 1, 0, true, '', true);
// text
$pdf->ln(8);

//_____________________________________
//*************************************
//      Academic Information

$text3 = <<<EOD

<table cellpadding="3">
<tr style="background-color:light gray;padding:5px;">
   <td> <b>15. Academic Information </b> <span style="font-size:10px;"> (Please do not attach copies of your academic certificates.)</span></td>
</tr>
<tr >
   <td>
      <p style="font-size:9px;"> <b> Note : </b>  CTS will not issue Roll No Slips to those who have not filled in their academic record properly.</p>
   </td>
</tr>

<tr >
   <td>
    <table border="0.5" cellpadding="5"  >
      <tr style="background-color:light gray;">
         <th>Certificate / Degree Name</th> 
         <th> Degree Title</th>
         <th> Major Subject</th>
         <th> Year Passing</th>
         <th> Obtained Marks / CGPA</th>
         <th> Total     Marks / CGPA</th>
         <th> Board / University</th>
      </tr>
      <tr style="height:30px;">
         <th> Matric </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
      <tr style="height:30px;">
         <th> Intermediate </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th> Bachelor <span style="font-size:9px;">(14 Years)</span> </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th width+"40px"> Bachelor <span style="font-size:9px;">(Hons)</span> / Master <span style="font-size:9px;">(16 Years)</span></th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th width+"40px"> MS / MPhill <span style="font-size:9px;">(18 Years)</span></th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr> 
       <tr style="height:30px;">
         <th width+"40px"> Others </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>   
    </table>  
   </td>
</tr>

<tr >
   <td></td>
</tr>
<tr style="background-color:light gray;padding:5px;">
   <td> <b>16. Professional / Other Certifications / Diploma / Skills : </b> </td>
</tr>
<tr >
   <td></td>
</tr>
<tr >
   <td>
    <table border="0.5" cellpadding="5"  >
      <tr style="background-color:light gray;">
         <th>Sr. #</th> 
         <th>Diploma / Certification</th>
         <th> Year From</th>
         <th> Year To</th>
         <th> Institute / University</th>
         <th> Marks / Grade</th>
      </tr>
      <tr style="height:30px;">
         <th> 01 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
      <tr style="height:30px;">
         <th> 02 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th> 03  </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th > 04 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
      </tr>
        
    </table>  
   </td>
</tr>
<tr >
   <td></td>
</tr>
<tr style="background-color:light gray;padding:5px;">
   <td> <b>17. Employment Record: </b> <span style="font-size:10px;"> (Please do not attach copies of your experience certificates.)</span> </td>
</tr>
<tr >
   <td></td>
</tr>
<tr >
   <td>
    <table border="0.5" cellpadding="5"  >
      <tr style="background-color:light gray;">
         <th>Sr. #</th> 
         <th>Organization / Employer Name</th>
         <th> Job Title</th>
         <th colspan="2">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Job Duration <br/><table cellpadding="5"><tr><th>&nbsp;&nbsp;&nbsp;From</th><th>&nbsp;&nbsp;&nbsp;&nbsp;To</th></tr></table></th>
         
      </tr>
      <tr style="height:30px;">
         <th> 01 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
      <tr style="height:30px;">
         <th> 02 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th> 03  </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr style="height:30px;">
         <th > 04 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         
        </tr>
        <tr style="height:30px;">
         <th > 05 </th>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         
        </tr>
        
    </table>  
   </td>
</tr>
</table>'
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $text3, 0, 1, 0, true, '', true);



// Section 2 : A

// ---------------------------------------------------------



// Section 3
$test_3 = '

<table cellpadding="3">
<tr >
   <td><b> 18. Total Post Qualification / Job Experience as on closing date of application : </b> ____________ (Years)</td>
</tr>
<tr >
   <td></td>
</tr>
<tr >
   <td><b> 19. Age Relaxation Clain: </b></td>
</tr>
<tr>
  <td>
    <ul> 
      
         <li>  Do you belomg to Scheduled Castes, Buddhist Community, Recognized Tribes of Tridal <br/> Areas, Azad Kashmir and Gilgit Baltistan ? <span style="font-size:9px;"> ( 03 Years )</span>
          <input type="checkbox" name="age_ceastes" value="1" /> Yes <input type="checkbox" name="age_ceastes" value="1" /> No </li>
         <li> Do you belong to Sindh (rural) or Balochistan ? (03 Years)   <input type="checkbox" name="age_ceastes" value="1" /> Yes <input type="checkbox" name="age_ceastes" value="1" /> No </li>
         <li> Are You Released OR Retired Officer / Personnel of ther Armed Forces of PAkistan ? (03 Years)   <input type="checkbox" name="age_ceastes" value="1" /> Yes <input type="checkbox" name="age_ceastes" value="1" /> No </li>
    </ul>  
  </td>
</tr>
</table>
';
$pdf->writeHTMLCell(0, 0, '', '', $test_3, 0, 1, 0, true, '', true);



$text4 = '

<table cellpadding="3">
<tr >
   <td></td>
</tr>
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td>Undertaking By The Applicant:</td>
</tr>
<tr >
   <td>I ______________________________ D / S / W of ___________________________ do hereby solemnly declare and affirm that I have read and understood the instructions and conditions for appearing in the CTS test, and I have filled up the application form as per instruction given below. 
       In case of any infromation contained herein is found at any stage to be missing, untrue, false or forged, my candidature can be canceled at any stage ( even after employment, if so revealed later), and I shall be liable to legal action.</td>
</tr>
<tr >
   <td></td>
</tr>
<tr >
   <td><b> Date :</b> _____________________ , &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;       <b>Signature of the Candidate: </b> ________________________</td>
</tr>
<tr >
   <td></td>
</tr>
<tr style="background-color:light gray;padding:5px;height:20px;">
   <td>General Instructions / Information :</td>
</tr>
<tr >
   <td></td>
</tr>

<tr style="">
   <td>
      <ul>
         <li>Please Fill the application form properly with complete and correct information.</li>
         <li>Please do not leave any field blank, otherwise your application may not be considered.</li>
         <li>Incorrect, false or forged information may result in cancellation of your candidature at any stage, even after employment, and also proceeding of a legal action.</li>
         <li>Attach your recent passport size photograph, copy of CNIC and bank deposit slip.</li>
         <li>Use separate envelop and separate application form for each post you are applying for.</li>
      </ul>   
   </td>
</tr>

</table>'
;
$pdf->writeHTMLCell(0, 0, '', '', $text4, 0, 1, 0, true, '', true);


$pdf->ln(4);
$pdf->startPage();
// Img
$img = '
<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="candidates_testing_services.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidates Testing Services Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">CTS Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Reg No :</b> '.$application_form_data['form_reg_no'].'  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
        </tr>
        
        <tr>
           <td> <b>Branch Code :</b> ________  &nbsp;&nbsp;  <b>Branch Name: </b> _______________ </td>
        </tr>
        
        <tr>
          <td align="center"><span style="font-size:9px;">ONLINE DEPOSITE SLIP</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:6px;">(* Please deposit fee in only one bank & tick the relevant bank)</span></td>
        </tr>
        <tr >
           <td >
              <table >
                <tr>
                  
                  <td>   
                      <table  style="font-size:8px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/mcb-logo.gif" width="25px" height="10px;"/> &nbsp;&nbsp;Muslim Commercial Bank &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b> No Bank Charges </td>
                            </tr>            
                      </table>  
                   </td>
                 </tr>
                 
               </table>         
            </td>
         </tr> 
         <tr>
           <td><b>* Note:</b> Desired Bank Stamp is required on the Deposit Slip.</td> 
         </tr>
         
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td> <b> Applicant\'s Name:</b></td>
                 </tr>
                 <tr>
                    <td><b>  Father Name:</b></td>
                 </tr>
                 <tr>
                    <td> <b> CNIC No/ B Form No:</b> </td>
                 </tr>
                 <tr>
                    <td> <b> Post Name: </b></td>
                 </tr>        
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td width="30%"><b>Ammount Rs: 500/-</b></td>
                    <td width="70%"> <b>Ammount in words : Seven Hundred Rupees Only </b><br/> (Non Refundable/ Non Transferable)</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" >
                 <tr>
                    <td width="30%">___________________<br/>&nbsp;Applicant Signature</td>
                    <td width="5%;"></td>
                    <td width="30%"> _______________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Cashier</td>
                    <td width="5%;"></td>
                    <td width="30%"> __________________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Officer</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
      </table>
     </td>
 </tr>
 </table>    


';

$pdf->writeHTMLCell(0, 0, '5', '10', $img, 0, 1, 0, true, '', true);
$img = 
'<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="candidates_testing_services.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidates Testing Services Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">Bank Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Reg No :</b> '.$application_form_data['form_reg_no'].'  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
        </tr>
        
        <tr>
           <td> <b>Branch Code :</b> ________  &nbsp;&nbsp;  <b>Branch Name: </b> _______________ </td>
        </tr>
        
        <tr>
          <td align="center"><span style="font-size:9px;">ONLINE DEPOSITE SLIP</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:6px;">(* Please deposit fee in only one bank & tick the relevant bank)</span></td>
        </tr>
        <tr >
           <td >
              <table >
                <tr>
                  <td>   
                      <table  style="font-size:8px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/mcb-logo.gif" width="25px" height="10px;"/> &nbsp;&nbsp;Muslim Commercial Bank &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b> No Bank Charges </td>
                            </tr>            
                      </table>  
                   </td>
                 </tr>
                 
               </table>         
            </td>
         </tr> 
         <tr>
           <td><b>* Note:</b> Desired Bank Stamp is required on the Deposit Slip.</td> 
         </tr>
         
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td> <b> Applicant\'s Name:</b></td>
                 </tr>
                 <tr>
                    <td><b>  Father Name:</b></td>
                 </tr>
                 <tr>
                    <td> <b> CNIC No/ B Form No:</b> </td>
                 </tr>
                 <tr>
                    <td> <b> Post Name: </b></td>
                 </tr>        
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td width="30%"><b>Ammount Rs: 700/-</b></td>
                    <td width="70%"> <b>Ammount in words : Seven Hundred Rupees Only </b><br/> (Non Refundable/ Non Transferable)</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" >
                 <tr>
                    <td width="30%">___________________<br/>&nbsp;Applicant Signature</td>
                    <td width="5%;"></td>
                    <td width="30%"> _______________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Cashier</td>
                    <td width="5%;"></td>
                    <td width="30%"> __________________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Officer</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
      </table>
     </td>
 </tr>
 </table> ';   



$pdf->writeHTMLCell(0, 0, '102', '10', $img, 0, 1, 0, true, '', true);
$pdf->ln(8);
$img = '
<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="candidates_testing_services.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidates Testing Services Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">Student Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Reg No :</b> '.$application_form_data['form_reg_no'].'  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
        </tr>
        
        <tr>
           <td> <b>Branch Code :</b> ________  &nbsp;&nbsp;  <b>Branch Name: </b> _______________ </td>
        </tr>
        
        <tr>
          <td align="center"><span style="font-size:9px;">ONLINE DEPOSITE SLIP</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:6px;">(* Please deposit fee in only one bank & tick the relevant bank)</span></td>
        </tr>
        <tr >
           <td >
              <table >
                <tr>
                 
                  <td>   
                      <table  style="font-size:8px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/mcb-logo.gif" width="25px" height="10px;"/> &nbsp;&nbsp;Muslim Commercial Bank &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b> No Bank Charges </td>
                            </tr>            
                      </table>  
                   </td>
                 </tr>
                 
               </table>         
            </td>
         </tr> 
         <tr>
           <td><b>* Note:</b> Desired Bank Stamp is required on the Deposit Slip.</td> 
         </tr>
         
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td> <b> Applicant\'s Name:</b></td>
                 </tr>
                 <tr>
                    <td><b>  Father Name:</b></td>
                 </tr>
                 <tr>
                    <td> <b> CNIC No/ B Form No:</b> </td>
                 </tr>
                 <tr>
                    <td> <b> Post Name: </b></td>
                 </tr>        
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" border="0.3">
                 <tr>
                    <td width="30%"><b>Ammount Rs: 700/-</b></td>
                    <td width="70%"> <b>Ammount in words : Seven Hundred Rupees Only </b><br/> (Non Refundable/ Non Transferable)</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
         <tr>
            <td></td>
         </tr>
         
         <tr>
            <td></td>
         </tr>
         <tr >
           <td >
              <table  style="font-size:7px;padding:2px;" >
                 <tr>
                    <td width="30%">___________________<br/>&nbsp;Applicant Signature</td>
                    <td width="5%;"></td>
                    <td width="30%"> _______________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Cashier</td>
                    <td width="5%;"></td>
                    <td width="30%"> __________________<br/>&nbsp;&nbsp;&nbsp;&nbsp; Officer</td>
                 </tr>
                
                         
              </table> 
            </td>
         </tr>
      </table>
     </td>
 </tr>
 </table> ';   



$pdf->writeHTMLCell(0, 0, '5', '', $img, 0, 1, 0, true, '', true);
//$pdf->writeHTMLCell(0, 0, '50', '50', $img, 0, 1, 0, true, '', true);

// This method has several options, check the source code documentation for more information.
//$id = $_SESSION['account_owner_id'];
$pdf->Output('application_form.pdf', 'D');
  
//$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/tcpdf/examples/pdf_reports/report_'.$id.'_'.time().'.pdf', 'F');
$file_name = $application_form_data['test_file_name'].'.pdf';//'report_'.$id.'_'.time().'.pdf';
//$_SESSION['test_file_name'] = $file_name;
//echo realpath(dirname(__FILE__)); exit;
$pdf->Output(realpath(dirname(__FILE__)).'/app_forms/'.$file_name, 'F');
// last url save in session
//$_SESSION['last_url'] = $_SERVER['HTTP_REFERER'];
//header('location:http://www.cts.org.pk/demo/admin/test/list'); 
//============================================================+
// END OF FILE
//============================================================+
