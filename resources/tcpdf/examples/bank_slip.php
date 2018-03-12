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
    $this->Cell(0, 0, 'Application Form | Candidate Testing Service', 0, true, 'L', 0, '', 1, false, 'C', 'M');

    
  }
  public function Header() {
  }
  public function Footer22() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    $this->ln(4);
    $this->Cell(0, 0, 'Application Form | Candidate Testing Service', 0, true, 'L', 0, '', 1, false, 'T', 'M');
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
$img = <<<EOD
<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="cts_logo.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidate Testing Service Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">CTS Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Unique ID :</b> ______________  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
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
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;height:20px;">
                            <td> <img src="../../images/bank_img/alied_bank.png" width="25px" height="10px;"/> &nbsp;&nbsp;Allied Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td style="height:10px;"> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
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
                 <tr>
                  <td>
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/nbp.png" width="25px" height="10px;"/> &nbsp;&nbsp;National Bank Pakistan &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/United_Bank,_Pakistan,_logo.png" width="25px" height="10px;"/> &nbsp;&nbsp; United Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                    <td> <b> Applicant's Name:</b></td>
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
 </table>    


EOD;

$pdf->writeHTMLCell(0, 0, '5', '0', $img, 0, 1, 0, true, '', true);
$img = <<<EOD
<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="cts_logo.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidate Testing Service Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">CTS Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Unique ID :</b> ______________  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
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
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;height:20px;">
                            <td> <img src="../../images/bank_img/alied_bank.png" width="25px" height="10px;"/> &nbsp;&nbsp;Allied Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td style="height:10px;"> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
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
                 <tr>
                  <td>
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/nbp.png" width="25px" height="10px;"/> &nbsp;&nbsp;National Bank Pakistan &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/United_Bank,_Pakistan,_logo.png" width="25px" height="10px;"/> &nbsp;&nbsp; United Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                    <td> <b> Applicant's Name:</b></td>
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
 </table>    

EOD;

$pdf->writeHTMLCell(0, 0, '102', '0', $img, 0, 1, 0, true, '', true);
$pdf->ln(8);
$img = <<<EOD
<table border="1" width="270px;"  style="padding:5px;font-size:9px;">
<tr>
   <td>
     <table style="height:300px;">
       <tr>
           <td><img src="cts_logo.png" style="width:30px; color:black;"/> 
           <span style="font-size:12px;"><b> Candidate Testing Service Pakistan</b></span><br/></td>
       </tr>
       <tr>
          <td align="center"><span style="background-color:gray;color:white;font-size:10px;">CTS Copy</span></td>
        </tr>
        <tr>
          <td align="center"><span style="font-size:10px;">Directorate General, Passport Immigration</span></td>
        </tr>
          
        <tr>
           <td> <b>Unique ID :</b> ______________  &nbsp;&nbsp;  <b>Date: </b> __________________ </td>
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
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;height:20px;">
                            <td> <img src="../../images/bank_img/alied_bank.png" width="25px" height="10px;"/> &nbsp;&nbsp;Allied Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
                          </tr>
                          <tr>
                             <td style="height:10px;"> <b>Remote Branch :</b> I-8 Markaz Branch Islamabad </td>
                           </tr>
                           <tr>
                              <td> <b>A/C Title :</b> CTS Pakistan </td>
                            </tr>
                            <tr>
                              <td> <b>A/c No: </b> 000999888889 </td>
                            </tr>
                            <tr>
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
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
                 <tr>
                  <td>
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/nbp.png" width="25px" height="10px;"/> &nbsp;&nbsp;National Bank Pakistan &nbsp;&nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                               <td> <b> Note : </b>  No Bank Charges </td>
                            </tr>            
                      </table> 
                  </td>
                  <td>   
                      <table width="120px" style="font-size:5px;padding:2px;" border="0.3">
                         <tr style="background-color:light gray;">
                            <td> <img src="../../images/bank_img/United_Bank,_Pakistan,_logo.png" width="25px" height="10px;"/> &nbsp;&nbsp; United Bank Limited &nbsp;&nbsp;<input type="checkbox" name="bank1" value="1"></td>
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
                    <td> <b> Applicant's Name:</b></td>
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
 </table>    

EOD;

$pdf->writeHTMLCell(0, 0, '5', '', $img, 0, 1, 0, true, '', true);
//$pdf->writeHTMLCell(0, 0, '50', '50', $img, 0, 1, 0, true, '', true);



// Test Conducted


//   DATA



//



 


$pdf->ln(4);
// This method has several options, check the source code documentation for more information.
//$id = $_SESSION['account_owner_id'];
$pdf->Output('report.pdf', 'I');

//$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/tcpdf/examples/pdf_reports/report_'.$id.'_'.time().'.pdf', 'F');
//$file_name = $application_form_data['test_file_name'].'.pdf';//'report_'.$id.'_'.time().'.pdf';
//$_SESSION['test_file_name'] = $file_name;
//echo realpath(dirname(__FILE__)); exit;
//$pdf->Output(realpath(dirname(__FILE__)).'/app_forms/'.$file_name, 'F');
// last url save in session
//$_SESSION['last_url'] = $_SERVER['HTTP_REFERER'];
header('location:http://localhost/CTS/admin/test/list'); 
//============================================================+
// END OF FILE
//============================================================+
