<?php
// debug($slts);
?>
<div id="mc-title">
	<h1> View Student Learning Time (SLT) </h1>
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array(
														'controller' => 'courses', 
														'action' => 'view',
														$this->passedArgs[0]
														));
			?>
			</li>
		</ul>
	</div>
	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>

<table class="adminlist">
<thead>
<tr>
	<th rowspan=2> WEEK </th>
	<th rowspan=2> TOPIC </th>
	<th rowspan=2> SLT </th>
	<th rowspan=2> F2F </th>
	<th colspan=2> NF2F </th>
	<th rowspan=2> &nbsp; </th>
</tr>
<tr>
	<th>
		G
	</th>
	<th>
		NG
	</th>
</tr>
</thead>
<tbody>

<?php
	$i = 0;
	$total = 0;
	$total_f2f = 0;
	$total_nf2fg = 0;
	$total_nf2fng = 0;
	$week = 1;

/*	foreach($slts as $slt) {	
	?>
	<tr>
		<td><?php echo $week; ?></td>

		<?php
		if($slt['Slt']['week'] == $week) {

			foreach($slt['Content'] as $content) {
				echo "<td>" . $content['description'] . "</td>";
			}

			echo "<td>" . $slt['Slt']['f2f'] . "</td>";
			echo "<td>" . $slt['Slt']['nf2f'] . "</td>";
			echo "<td>" . $slt['Slt']['nf2fng'] . "</td>";			
		}
		else {

		}
	}
*/

// This is the old one 

	for($week = 1; $week <= 14; ) {

	$total_slt = 0;
	$total_slt = $slt = $slts[$i]['Slt']['f2f'] + 
		   		 $slts[$i]['Slt']['nf2fg'] + 
		   		 $slts[$i]['Slt']['nf2fng'];

	$total += $total_slt;
	$total_f2f += $slts[$i]['Slt']['f2f'];
	$total_nf2fg += $slts[$i]['Slt']['nf2fg'];
	$total_nf2fng += $slts[$i]['Slt']['nf2fng'];
	?>

	<tr>
		<td><?php echo $week; ?></td>
		<?php
		if( $slts[$i]['Slt']['week'] == $week) {

		echo "<td>";

		foreach ($slts[$i]['Content'] as $content): 

			echo $content['description'];
			echo "<br />";

		endforeach;
		?>
		</td>
		<td align="center"><?php echo $total_slt; ?></td>		
		<td align="center"><?php echo $slts[$i]['Slt']['f2f']; ?></td>
		<td align="center"><?php echo $slts[$i]['Slt']['nf2fg']; ?></td>
		<td align="center"><?php echo $slts[$i]['Slt']['nf2fng']; ?></td>	
		<td>
			<?php
			  echo $this->Html->link(__('Add'), array(
			  										'controller' => 'slts', 
			  										'action' => 'add', 
													$this->passedArgs[0],$week));
			  
			  echo "&nbsp; | &nbsp;";

			  echo $this->Html->link(__('Edit'), array(
			  										'controller' => 'slts', 
			  										'action' => 'edit', 
			  										$slts[$i]['Slt']['id']
			  										));
			  
			  echo "&nbsp; | &nbsp;";
			  
			  echo $this->Form->postLink(__('Delete'), array('controller' => 'slts', 'action' => 'delete', $slts[$i]['Slt']['id'],'?' => array('course_id'=>$slts[$i]['Slt']['course_id'])), null, __('Are you sure you want to delete # %s?', $slts[$i]['Slt']['id'])); 
			?>
		</td>
		<?php
			$i++;
		}
		else {
		?>
			<td> &nbsp; </td>
			<td align="center"> 0 </td>
			<td align="center"> 0 </td>
			<td align="center"> 0 </td>	
			<td align="center"> 0 </td>		
			<td>
			<?php
			  echo $this->Html->link(__('Add'), array(
			  										'controller' => 'slts', 
			  										'action' => 'add', 
													$this->passedArgs[0],$week));
			?>
			</td>
		<?php
		}
		?>
	</tr>
<?php
		if($slts[$i]['Slt']['week'] != $week) {
			$week++;
		}
	}
?>
<tr>
	<td> &nbsp; </td>
	<td> Total </td>
	<td align="center"> <?php echo $total; ?> </td>
	<td align="center"> <?php echo $total_f2f; ?> </td>
	<td align="center"> <?php echo $total_nf2fg; ?> </td>
	<td align="center"> <?php echo $total_nf2fng; ?> </td>
	<td> &nbsp; </td>
</tr>
<tr>
	<td> &nbsp; </td>
	<td> Student Learning Time (SLT) per week </td>
	<td align="center"> <?php echo number_format($total/14, 1); ?> </td>
	<td align="center"> <?php echo number_format($total_f2f/14, 1); ?> </td>
	<td align="center"> <?php echo number_format($total_nf2fg/14, 1); ?> </td>
	<td align="center"> <?php echo number_format($total_nf2fng/14, 1); ?> </td>
	<td> &nbsp; </td>
</tr>

</tbody>
</table>
</div>