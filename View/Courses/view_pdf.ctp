<?php
App::import('Vendor','tcpdf/tcpdf'); 

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    public function Header() {
        $image_file = 'http://127.0.0.1/uhek/img/logo.png';

        if($this->page==1){
			$this->SetMargins(25, 25, 25, true);

	        $this->Image($image_file, '','', 25, 25, 'png', '', 'N', false, 300, 'C', 'B', false, 0, false, false, false);
			
	        $this->SetFont('times', '', 12);

			$this->Cell(0, 0, '','',2, 'C', 0, '', 0, false, 'M', 'M');
			$this->Cell(0, 20, 'UNIVERSITI TEKNOLOGI MARA','',2, 'C', 0, '', 0, false, 'M', 'M');

			$this->SetFont('Helvetica', 'B', 12);

			$this->Cell(0, 0, '','',2, 'C', 0, '', 0, false, 'M', 'M');
			$this->Cell(0, 0, '','',2, 'C', 0, '', 0, false, 'M', 'M');			
			$this->Cell(0, 0, '','',2, 'C', 0, '', 0, false, 'M', 'M');			
			$this->Cell(0, 0, '','',2, 'C', 0, '', 0, false, 'M', 'M');			
			$this->Cell(0, 20, 'COURSE INFORMATION','',2, 'C', 0, '', 0, false, 'M', 'M');

			$this->SetFont('Helvetica', 'B', 10);

			$this->Cell(0, 0, 'Confidential','',2, 'C', 0, '', 0, false, 'M', 'M');

   		}
   	}

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
		$this->SetFont('freesans', '', 10); 
        // Page number
        // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		$txt='Page '.$this->PageNo().' of '.$this->getAliasNbPages();        
        $this->Cell(0, 10, $txt, 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor("Unit Hal Ehwal Kokurikulum - UHEK");
$pdf->SetTitle('Course Information');
$pdf->SetSubject('Course Information');
$pdf->SetKeywords('Course Information, Maklumat Kursus, OBE');

/*
$pdf->SetHeaderData(PDF_HEADER_LOGO, '60', 'UNIVERSITI TEKNOLOGI MARA', 'test', array(0,64,255), array(0,64,128));
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));
*/

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(20);	        
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page (required with recent versions of tcpdf)
$pdf->AddPage();

// Now you position and print your page content
$pdf->SetTextColor(0, 0, 0);

if($course['Course']['status'] == 1)
	$elective = "UNIVERSITY COURSES"; 
else if($course['Course']['status'] == 2)
	$elective = "CORE";
else if($course['Course']['status'] == 3)
	$elective = "ELECTIVE";

if($course['Course']['requisite'] == 1) 
	$requisite = "YES";
else if($course['Course']['requisite'] == 2)
	$requisite = "NONE";

$faculty = h($course['Faculty']['name']);
$program = h($course['Program']['name_bm']);
$code = h($course['Course']['id']);
$name = h($course['Course']['name']);
$credit = h($course['Course']['credit']);
$contact = h($course['Course']['contact']);
$semester = h($course['Course']['semester']);
$level = h($course['Level']['name']);

$tbl = <<< EOD
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<br >
<table cellpadding="10">
<tr>
		<td width="30%" align="left"><strong>Code</strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$code
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Course</strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$name
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Level</strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$level
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Credit Unit</strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$credit
		</td>
</tr>

<tr>
		<td width="30%" align="left"><strong>Contact Hour</strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$contact
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Part </strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$semester
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Course Status </strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$elective
		</td>
</tr>
<tr>
		<td width="30%" align="left"><strong>Prerequisite </strong></td>
		<td width="10%" align="left"> : </td>
		<td width="60%" align="left">
			$requisite
		</td>
</tr>
EOD;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$pdf->AddPage();

$tbl ='<br /><h3> 1.0 SYNOPSIS </h3>';

	if (!empty($course['Synopsis'])):		
	$i = 0;
		foreach ($course['Synopsis'] as $synopsis):
			
			$tbl .= $synopsis['description'];

		endforeach; 
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl = '<br /><h3> 2.0 COURSE OUTCOMES </h3>';

	if (!empty($course['Outcome'])):

	$tbl .= '<p> At the end of this course, the students should be able to: </p><ol>';
		
		foreach ($course['Outcome'] as $outcome):
			$tbl.='<li> ' . $outcome['description'] . '</li>';
		endforeach;
	
	$tbl .= '</ol>';
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl ='<br /><h3> 3.0 METHOD OF INSTRUCTIONS </h3>';

	if (!empty($course['Instruction'])):

	$tbl .= '<ol>';

		foreach ($course['Instruction'] as $instruction):
			$tbl .= '<li> ' . $instruction['name'] . '</li>';
		endforeach;
	
	$tbl .= '</ol>';
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl = '<br /><h3> 4.0 CONTENTS </h3>';
		
		if(!empty($nodelist)) {

    	foreach ($nodelist_array AS $nodelistId => $nodelist):

		$tbl .= $nodelist['Content']['number'] . '	 ';
    	$tbl .= $nodelist['Content']['path'];
	
		$tbl .= '<br />';	
		endforeach;

		}

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl = '<br><h3> 5.0 ASSESSMENT </h3>';

$tbl .= '<p> Student will be assessed as follows: </p>';

	if (!empty($course['Assessment'])):		
		$total_continuous = 0;
		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 1) {
				$total_continuous += $assessment['percentage'];
			}
		endforeach;

		$tbl .= '<table><thead>';
		$tbl .= '<tr><th> Name of continuous assessment </th><th> Percentage (%) </th><th> &nbsp; </th></tr>';
		$tbl .= '</thead>';

		$tbl .= '<tbody>';

		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 1) {
				$tbl .= '<tr><td>' . $assessment['name'] . 
					 '</td><td>' . $assessment['percentage'] .
					 '% </td></tr>';
			}
		endforeach;

		$tbl .= '<tr><td colspan="3"> &nbsp; </td></tr>';

		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 2) {
				$tbl .= '<tr><td>' . $assessment['name'] . 
					 '</td><td>' . $assessment['percentage'] .
					 '% </td></tr>';
			}
		endforeach;

		$tbl .= '</tbody></table>';		
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl = '<br><h3> 6.0 TEXTBOOK </h3>';
	
	if (!empty($course['Textbook'])):
	
	$tbl .= '<ol>';
		
		foreach ($course['Textbook'] as $textbook):	
			$tbl .= '<li>';
			$tbl .= $textbook['author'] . 
					' (' . $textbook['year'] . '), ' .
					$textbook['title'] . ', ' .
					$textbook['edition'] . ', ' .
					$textbook['publisher'] . '.'; 
			$tbl .= '</li>';
		endforeach;
	
	$tbl .= '</ol>';
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

$tbl = '<br /><h3> 7.0 REFERENCES </h3>';

	if (!empty($course['Reference'])):
	
	$tbl .= '<ol>';
		
	foreach ($course['Reference'] as $reference):
		
		$tbl .= '<li>';
				$tbl .= $reference['author'] . 
				' (' . $reference['year'] . '), ' .
				$reference['title'] . ', ' .
				$reference['edition'] . ', ' .
				$reference['publisher'] . '.'; 
		$tbl .=	'</li>';
	endforeach;
	
	$tbl .= '</ol>';
	endif;

$pdf->writeHTML($tbl,true,false,true,true,'L');

echo $pdf->Output('filename.pdf', 'D');

?>