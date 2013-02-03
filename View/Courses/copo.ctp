<?php
$size = count($pos);
?>

<div id="mc-title">
	<h1>Course Learning Outcome-Program Learning Outcome (CLO-PLO) Matrix</h1>
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array(
														'controller' => 'courses', 
														'action' => 'view', $programs['Course']['id'])); 
			?>						
			</li>
			<li class="divider">
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
	<div class="mc-clr"></div>

<table width="100%">
	<tr>
		<td> COURSE CODE </td>
		<td> <strong><?php echo $programs['Course']['id']; ?> </strong></td>
		<td> CENTRE OF STUDY </td>
		<td> &nbsp; </td>
	</tr>
	<tr>
		<td> COURSE NAME </td>
		<td> <strong><?php echo $programs['Course']['name']; ?></strong></td>
		<td> PREPARED BY </td>
		<td> &nbsp; </td>
	</tr>
	<tr>
		<td> CREDIT HOURS </td>
		<td> <strong><?php echo $programs['Course']['credit']; ?></strong></td>
		<td> DATE </td>
		<td> &nbsp; </td>
</table>
<br>
<br>
<table class="adminlist">
	<tr>
		<td rowspan='2' width='30%'> <strong> COURSE LEARNING OUTCOMES </strong></td>
		<td colspan='<?php echo $size ?>'> <strong> PROGRAM LEARNING OUTCOMES </strong></td>
		<td rowspan='2'> <strong> INSTRUCTIONAL METHOD </strong></td>
		<td rowspan='2'> <strong> ASSESSMENT </strong></td>
	</tr>
	<tr>
		<?php
			for($i=1; $i<=$size; $i++) {
				echo "<td> PO" . $i . "</td>";
			}
		?>

		<?php 
			foreach($outcomes as $outcome) {
				echo '<tr><td>' . $outcome['Outcome']['description'] . '</td>';

				foreach($pos as $key=>$value) {
					echo '<td>';

					foreach($outcome['Po'] as $outpo) {
						if($outpo['id'] == $key) {
							echo 'X';
						}
					}
					echo '</td>';
				}

				echo '<td><ul>';

				foreach($outcome['Instruction'] as $ins) {
					echo '<li>' . $ins['name'] . '</li>';
				}
				echo '</ul></td>';
				echo '<td><ul>';

				foreach($outcome['Assessment'] as $ass) {
					echo '<li>' . $ass['name'] . '</li>';
				}

				echo '</ul>';
				echo '</td>';
				echo '</tr>';
			}
		?>
</table>

</div>
<br />
<br />