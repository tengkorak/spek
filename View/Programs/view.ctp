<?php
$group_id = $this->Session->read('Auth.User.group_id');
?>

<div id="mc-title">
	<h1> Program Overview </h1>

	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">

			<?php echo $this->Html->link(__('Back'), array(
													'controller' => 'programs', 
													'action' => 'index'
													));
			?>
			</li>


			<?php
			if($group_id == 1 || $group_id == 4) {

				if($program['Program']['submitted'] == 0) {

				?>

				<li class="button" id="toolbar-edit">
				<a href="/programs/edit/<?php echo $program['Program']['id'];?>" class="toolbar">
				Edit
				</a>
				</li>

				<li class="button" id="toolbar-delete">
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?>
				</li>

				<li class="button submit" id="toolbar-submit">
				<?php echo $this->Form->postLink(__('Submit'), array('action' => 'submit', $program['Program']['id'],$this->passedArgs[0]), null, __('Are you sure you want to submit course %s? You will not be able to edit this course after it has been submitted.', $program['Program']['id'])); ?>
				</li>

			<?php
				}
			}
			?>

			<li class="divider">
			</li>

			<li class="button special" id="toolbar-popeo">
			<?php echo $this->Html->link(__('PLO-PEO'), array(
													'controller' => 'pos', 
													'action' => 'popeo',
													$program['Program']['id']
													));
			?>
			</li>

			<li class="button special" id="toolbar-poloki">
			<?php echo $this->Html->link(__('PLO-LOKI'), array(
													'controller' => 'pos', 
													'action' => 'poloki',
													$program['Program']['id']
													));
			?>
			</li>

			<?php
			if($group_id == 1) {
			?>

			<li class="button special" id="toolbar-edit">
			<?php echo $this->Html->link(__('Add KPP/PP'), array(
													'controller' => 'programs', 
													'action' => 'searchCoor',
													$program['Program']['id']
													));
			?>			
			</a>
			</li>


			<?php
			}
			?>			
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>

<table>
<tr>
		<td><strong><?php echo __('Program Code'); ?> </strong></td>
		<td> :
			<?php echo h($program['Program']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Name (English)'); ?></strong></td>
		<td> :
			<?php echo  h( strtoupper($program['Program']['name_be']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Name (Malay)'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Program']['name_bm']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Faculty'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Faculty']['name']) ); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('Level'); ?></strong></td>
		<td> :
			<?php echo h( strtoupper( $program['Level']['name']) ); ?>
			&nbsp;
		</td>
</tr>
</table>
<br />

<h3><?php echo __('Program Educational Objectives (PEO)');?></h3>
<?php if (!empty($program['Peo'])):?>
<table class="adminlist">
<thead>
<tr>
	<th><?php echo __('Objectives'); ?></th>

	<?php
	if($group_id == 1 || $group_id == 4) {
	?>
	
	<th class="actions">&nbsp;</th>

	<?php
	}
	?>

</tr>
</thead>
<tbody>
<?php
	$i = 1;
	foreach ($program['Peo'] as $peo): ?>
	<tr>
		<td><?php echo $i . ". " . $peo['description'];?></td>

		<?php
		if($group_id == 1 || $group_id == 4) {
			if($program['Program']['submitted'] == 0) {
		?>

			<td class="actions" width="10%">
				<?php
				  echo $this->Html->link(__('Edit '), array('controller' => 'peos', 'action' => 'edit', $peo['id'],
				   '?' => array('program_id'=>$this->params['pass']['0']) ));				
				  echo $this->Form->postLink(__(': Delete'), array('controller' => 'peos', 'action' => 'delete', $peo['id'],'?' => array('program_id'=>$this->params['pass']['0'])), null, __('Are you sure you want to delete # %s?', $peo['id'])); 
				?>
			</td>

		<?php
			}
		}
		?>

	</tr>
<?php 
$i++;
endforeach; 
?>
</tbody>
</table>
<?php endif; ?>

<?php
if($group_id == 1 || $group_id == 4) {
	if($program['Program']['submitted'] == 0) {
?>

	<div class="mc-toolbar" id="toolbar">
	<ul>
		<li class="button" id="toolbar-newpeo">
			<?php echo $this->Html->link(__('Add New Program Objectives'), array('controller' => 'peos', 'action' => 'add', '?' => array('program_id'=>$this->params['pass']['0'])));?> 
		</li>
	</ul>
	</div>
	<div class="mc-clr"></div>

<?php
	}
}
?>

<br />

	<h3><?php echo __('Program Learning Outcome (PLO)');?></h3>
	<?php if (!empty($program['Po'])):?>
	<table class="adminlist">
	<thead>
	<tr>
		<th><?php echo __('Outcomes'); ?></th>

	<?php
			if($group_id == 1 || $group_id == 4) {
	?>		
	
	<th class="actions">&nbsp;</th>
	
	<?php
	}
	?>

	</tr>
	</thead>
	<tbody>
	<?php
		$i = 1;
		foreach ($program['Po'] as $po): ?>
		<tr>
			<td><?php echo $i . ". " . $po['description'];?></td>

		<?php
			if($group_id == 1 || $group_id == 4) {
				if($program['Program']['submitted'] == 0) {				
		?>			

				<td class="actions" width="10%">
					<?php
					  echo $this->Html->link(__('Edit '), array('controller' => 'pos', 'action' => 'edit', $po['id'],
					  	'?' => array('program_id'=>$this->params['pass']['0'])
					  	));				
					  echo $this->Form->postLink(__(' : Delete'), array('controller' => 'pos', 'action' => 'delete', $po['id'],'?' => array('program_id'=>$this->params['pass']['0'])), null, __('Are you sure you want to delete # %s?', $po['id'])); 
					?>
				</td>

		<?php
			}
		}
		?>

		</tr>
	<?php 
	$i++;
	endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

<?php
	if($group_id == 1 || $group_id == 4) {
		if($program['Program']['submitted'] == 0) {
?>

		<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-newpeo">
				<?php echo $this->Html->link(__('Add New Program Outcome'), array('controller' => 'pos', 'action' => 'add', '?' => array('program_id'=>$this->params['pass']['0'])));?>
			</li>
		</ul>
		</div>

		<div class="mc-clr"></div>

<?php
		}
	}
?>

<br />

	<h3><?php echo __('List of Courses');?></h3>
	<?php if (!empty($courses)):?>
	<?php
		$i = 0;
		$semester = 0; 
		foreach ($courses as $course):

		if($semester != 0 && $course['Course']['semester'] != $semester) {
			echo "</tbody>";
			echo "</table>";
		}

		if($course['Course']['semester'] != $semester) {
		$semester = $course['Course']['semester'];

		echo "<h3> Semester " . $semester . "</h3>"; 
		?>

		<table class="adminlist">
		<thead>
		<tr>
			<th width="10%"><?php echo __('Code'); ?></th>
			<th width="50%"><?php echo __('Name'); ?></th>
			<th><?php echo __('Resource Person'); ?></th>

			<?php
			if( ($group_id == 1 || $group_id == 4) && $program['Program']['submitted'] == 0) {
			?>

			<th width="5%"><?php echo __('Completed'); ?></th>			

			<?php
			}
			?>

		</tr>
		</thead>
		<tbody>

		<?php
		}
		?>

		<tr>
			<td  width="10%"><?php echo $this->Html->link($course['Course']['id'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'], $program['Program']['id'])); 
				?>
			</td>
			<td><?php echo strtoupper($course['Course']['name']);?></td>

			<td>
				<?php 
				if(!empty($course['User']['fullname'])){
					echo strtoupper($course['User']['fullname']); 
				} else {
					echo '&nbsp';
				}
				?>
			</td>

			<?php
			if( ($group_id == 1 || $group_id == 4) && $program['Program']['submitted'] == 0) {			
			?>

			<td>
				<div class="mc-toolbar" id="toolbar">
				<ul>
					<?php
						if($course['Course']['submitted'] == 1){
					?>
							<li class="button special" id="toolbar-submitted">
								<?php echo $this->Html->link("YES", array('controller' => 'courses', 'action' => 'check', $course['Course']['id'], $program['Program']['id'])); 
								?>
							</li>
					<?php
						}
						else if($course['Course']['submitted'] == 2){
					?>
							<li class="button approved" id="toolbar-approved">
								<?php echo $this->Html->link("CHECKED", '#'); 
								?>
							</li>
					<?php
						}
						else {
					?>		
							<li class="button" id="toolbar-submitted">
								<a href="#"> NO </a>
							</li>
					<?php
						}						
					?>
				</ul>
				</div>
			</td>
			<?php
			}
			?>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

<?php
if( ($group_id == 1 || $group_id == 4) && $program['Program']['submitted'] == 0) {			
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
	<?php echo $this->Html->link(__('Add New Course'), array('controller' => 'courses', 'action' => 'add', 
							  '?' => array('program_id'=>$this->params['pass']['0'])
							  )
				);
				?>
		</li>
	</ul>
</div>

<?php
}
?>

</div> <!-- mc-component -->
<br />
<br />