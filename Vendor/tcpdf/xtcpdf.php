<?php
App::import('Vendor', 'tcpdf/tcpdf');

class XTCPDF extends TCPDF {

    var $xheadertext = 'Heading';
    var $xheadercolor = array(0, 0, 200);
    var $xfootertext = 'Footer';
    var $xfooterfont = 'times';
    var $xfooterfontsize = 12;

    /**
     * Overwrites the default header
     * set the text in the view using
     *    $fpdf->xheadertext = 'YOUR ORGANIZATION';
     * set the fill color in the view using
     *    $fpdf->xheadercolor = array(0,0,100); (r, g, b)
     * set the font in the view using
     *    $fpdf->setHeaderFont(array('YourFont','',fontsize));
     */
    function Header() {

        list($r, $b, $g) = $this->xheadercolor;
        $this->SetY(-290);
        $this->SetFillColor($r, $b, $g);
        $this->SetTextColor(0, 0, 0);
       $this->SetFont('times', '', 14);
       $this->writeHTMLCell(-250, '', '', '', $this->xheadertext, 0, 0, false, true, 'C');
       $this->SetY(-280);
       $this->Cell(0,8, '','T',1,'C');
    }

    /**
     * Overwrites the default footer
     * set the text in the view using
     * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.';
     */
    function Footer() {
        $footertext = sprintf($this->xfootertext, $year);
        $this->SetY(-20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        $this->Cell(0,8, '','T',1,'C');
         $this->SetY(-18);
        // write the second column
        $this->writeHTMLCell(180, '', '', '', $this->xfootertext, 0, 0, false, true, 'C');
      }

}

?>