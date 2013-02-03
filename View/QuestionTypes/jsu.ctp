<?php
// debug($occurences);
?>

<div id="mc-title">
	<h1> View JSU </h1>
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
			<li class="button" id="toolbar-add">
			<?php echo $this->Html->link(__('Add'), array(
														'controller' => 'questionTypes', 
														'action' => 'add',
														$this->passedArgs[0],1
														));
			?>
			</li>

		</ul>
	</div>
	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<h1> Distribution of question types </h1>

<table class="adminlist">
<thead>
<tr>
	<th rowspan=2> CHAPTER </th>
	<th rowspan=2> PLO </th>
	<th rowspan=2> CLO </th>
	<th rowspan=2> TYPES </th>
	<th rowspan=2> TIME(SLT) </th>
	<th rowspan=2> TIME (%) </th>
	<th rowspan=2> MARKS (%) </th>
	<th colspan=6> COGNITIVE </th>
</tr>
<tr>
	<th> C1 </th>
	<th> C2 </th>
	<th> C3 </th>
	<th> C4 </th>
	<th> C5 </th>
	<th> C6 </th>
</tr>
</thead>
<tbody>
	<?php
		$all_slt = 0;
		$total_marks = 0;
		$current_content_id = 0;

		foreach($questionTypes as $questionType):	
			foreach($questionType['Content']['Slt'] as $slt):
					$all_slt += $slt['f2f'];
			endforeach;

			$total_marks += $questionType['QuestionType']['marks'];
		endforeach;


		foreach($questionTypes as $questionType): 	
			$total_slt = 0;

		    foreach($occurences as $index => $occurence) {
        		if($occurence['QuestionType']['content_id'] == $questionType['Content']['id'])
        		 $current = $index;
    		}

        	$row = $occurences[$current]['0']['c'];
	
			echo "<tr>";

			if($current_content_id != $questionType['Content']['id']) {
			?>	
			<td rowspan=<?php echo $row;?> > <?php echo $questionType['Content']['description']; ?> </td>
			<?php
			foreach($questionType['Content']['Outcome'] as $content):
				echo "<td rowspan=" . $row. ">";
				foreach($content['Po'] as $po):
						echo $po['description'] . "<br><br>";
				endforeach;				
				echo "</td>";
			endforeach;

			echo "<td rowspan=" . $row . ">";				
			foreach($questionType['Content']['Outcome'] as $content):
				echo $content['description'] . "<br><br>";
			endforeach;
			echo "</td>";
			}

			echo "<td>";				
				echo $questionType['QuestionType']['type'];
			echo "</td>";			

			echo "<td>";
			foreach($questionType['Content']['Slt'] as $slt):
					$total_slt += $slt['f2f'];
			endforeach;
			echo $total_slt;
			echo "</td>";

		?>
		<td> <?php echo number_format($total_slt/$all_slt * 100,1); ?> </td>
		<td> <?php echo number_format($questionType['QuestionType']['marks']/$total_marks * 100,1); ?> </td>		
		<?php
			for($i=1; $i<=6; $i++) {
				echo '<td>';
					if($questionType['QuestionType']['cognitive'] == $i)
						echo '<strong> / </strong>';
						// echo $questionType['QuestionType']['type'];
				echo '</td>';
			}
		?>		
	</tr>
	<?php
	$current_content_id = $questionType['Content']['id'];
	endforeach;
	?>
</tbody>
</table>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<h1> Distribution of marks </h1>

<table class="adminlist">
<thead>
<tr>
	<th rowspan=2> CHAPTER </th>
	<th rowspan=2> PLO </th>
	<th rowspan=2> CLO </th>
	<th rowspan=2> TYPES </th>
	<th rowspan=2> TIME(SLT) </th>
	<th rowspan=2> TIME (%) </th>
	<th rowspan=2> MARKS (%) </th>
	<th colspan=6> COGNITIVE </th>
</tr>
<tr>
	<th> C1 </th>
	<th> C2 </th>
	<th> C3 </th>
	<th> C4 </th>
	<th> C5 </th>
	<th> C6 </th>
</tr>
</thead>
<tbody>
	<?php
		$all_slt = 0;
		$total_marks = 0;
		$current_content_id = 0;

		foreach($questionTypes as $questionType):	
			foreach($questionType['Content']['Slt'] as $slt):
					$all_slt += $slt['f2f'];
			endforeach;

			$total_marks += $questionType['QuestionType']['marks'];
		endforeach;


		foreach($questionTypes as $questionType): 	
			$total_slt = 0;

		    foreach($occurences as $index => $occurence) {
        		if($occurence['QuestionType']['content_id'] == $questionType['Content']['id'])
        		 $current = $index;
    		}

        	$row = $occurences[$current]['0']['c'];
	
			echo "<tr>";
			
			if($current_content_id != $questionType['Content']['id']) {
			?>	
			<td rowspan=<?php echo $row;?> > <?php echo $questionType['Content']['description']; ?> </td>
			<?php
			foreach($questionType['Content']['Outcome'] as $content):
				echo "<td rowspan=" . $row. ">";
				foreach($content['Po'] as $po):
						echo $po['description'] . "<br><br>";
				endforeach;				
				echo "</td>";
			endforeach;

			echo "<td rowspan=" . $row . ">";				
			foreach($questionType['Content']['Outcome'] as $content):
				echo $content['description'] . "<br><br>";
			endforeach;
			echo "</td>";
			}

			echo "<td>";				
				echo $questionType['QuestionType']['type'];
			echo "</td>";			

			echo "<td>";
			foreach($questionType['Content']['Slt'] as $slt):
					$total_slt += $slt['f2f'];
			endforeach;
			echo $total_slt;
			echo "</td>";

		?>
		<td> <?php echo number_format($total_slt/$all_slt * 100,1); ?> </td>
		<td> <?php echo number_format($questionType['QuestionType']['marks']/$total_marks * 100,1); ?> </td>		
		<?php
			for($i=1; $i<=6; $i++) {
				echo '<td>';
					if($questionType['QuestionType']['cognitive'] == $i)
						// echo '<strong> / </strong>';
						echo $questionType['QuestionType']['marks'];
				echo '</td>';
			}
		?>		
	</tr>
	<?php
	$current_content_id = $questionType['Content']['id'];
	endforeach;
	?>
</tbody>
</table>
</div>
</br>