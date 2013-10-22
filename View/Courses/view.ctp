<style type="text/css">
ul 
#toolbar-jsus,
#toolbar-jsub,
#toolbar-jsup {
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
}
ul li 
{
    display: block;
    position: relative;
    float: left;
}
li ul {
    display: none;
}
li a 
#toolbar-jsus,
#toolbar-jsub, 
#toolbar-jsup {
    display: block;
    text-decoration: none;
    padding: 1px;
    margin-left: 1px;
    white-space: nowrap;
}
li:hover ul {
    display: block;
    position: absolute;
}
li:hover li {
    float: none;
    font-size: 11px;
}
</style>

<div id="mc-title">
	<h1> Course Information </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'view', $this->passedArgs[1])); ?>						
			</li>

			<?php

			if($course['Course']['submitted'] == 0) {
			?>

			<li class="button" id="toolbar-edit">
			<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['Course']['id'])); ?>		
			</li>
			<?php
			if ($this->Session->read('Auth.User')){
					if($this->Session->read('Auth.User.group_id') == 1)
					{
			?>
			<li class="button" id="toolbar-delete">
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
			</li>
			<?php
					}
				}
			}
			?>
			<li class="divider">
			</li>			

			<li class="button special" id="toolbar-slt">
			<?php echo $this->Html->link(__(' SLT '), array('controller' => 'slts', 'action' => 'view', $course['Course']['id'])); ?>
			</li>
			<li class="button special" id="toolbar-jsu">
			<a href="#"> JSU </a>
				<ul>
				<li class="button" id="toolbar-jsus">	
				<?php echo $this->Html->link(__(' JSU '), array('controller' => 'questionTypes', 'action' => 'jsu', $course['Course']['id'])); ?>
				</li>
				<li class="button" id="toolbar-jsub">	
				<?php echo $this->Html->link(__(' JSUB '), array('controller' => 'questionTypes', 'action' => 'jsub', $course['Course']['id'])); ?>
				</li>
				<li class="button" id="toolbar-jsup">	
				<?php echo $this->Html->link(__(' JSUP '), array('controller' => 'questionTypes', 'action' => 'jsup', $course['Course']['id'])); ?>
				</li>				
				</ul>
			</li>
			<li class="button special" id="toolbar-copo">
			<?php echo $this->Html->link(__(' CLO-PLO '), array('controller' => 'courses', 'action' => 'copo', $course['Course']['id'])); ?>
			</li>			
			<li class="button special" id="toolbar-pdf">
			<?php echo $this->Html->link(__(' PDF '), array('controller' => 'courses', 'action' => 'viewPdf', $course['Course']['id'])); ?>
			</li>

			<?php
			if($course['Course']['submitted'] == 0) {
			?>

			<li class="button submit" id="toolbar-submit">
			<?php echo $this->Form->postLink(__('Submit'), array('action' => 'submit', $course['Course']['id'],$this->passedArgs[1]), null, __('Are you sure you want to submit course %s? You will not be able to edit this course after it has been submitted.', $course['Course']['id'])); ?>
			</li>

			<?php
			}
			?>

			<?php
				if ($this->Session->read('Auth.User')){
					if($this->Session->read('Auth.User.group_id') == 1 || 
					   $this->Session->read('Auth.User.group_id') == 4)
					{
			?>			
			<li class="button special" id="toolbar-rp">
			<?php echo $this->Html->link(__(' Add RP '), array('controller' => 'courses', 'action' => 'searchRp', $course['Course']['id'])); ?>
			</li>
			<?php
					}
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
		<td><strong><?php echo __('FACULTY'); ?></strong></td>
		<td> :
			<?php echo h($course['Faculty']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('PROGRAM'); ?></strong></td>
		<td> :
			<?php echo h($program['Program']['name_bm']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('CODE'); ?></strong></td>
		<td> :
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('COURSE NAME'); ?></strong></td>
		<td> :
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('CREDIT UNITS'); ?></strong></td>
		<td> :
			<?php echo h($course['Course']['credit']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('CONTACT UNITS'); ?></strong></td>
		<td> :
			<?php echo h($course['Course']['contact']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('SEMESTER'); ?></strong></td>
		<td> :
			<?php echo h($course['Course']['semester']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('STATUS'); ?></strong></td>
		<td> :
			<?php 
				if($course['Course']['status'] == 1)
					echo "UNIVERSITY COURSES"; 
				else if($course['Course']['status'] == 2)
					echo "CORE";
				else if($course['Course']['status'] == 3)
					echo "ELECTIVE";
				?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('PREREQUISITE'); ?></strong></td>
		<td> :
			<?php 
				if($course['Course']['requisite'] == 1) 
					echo "YES";
				else if($course['Course']['requisite'] == 2)
					echo "NONE";
				?>
			&nbsp;
		</td>
</tr>
<tr>
		<td><strong><?php echo __('LEVEL'); ?></strong></td>
		<td> :
			<?php echo h($course['Level']['name']); ?>
			&nbsp;
		</td>
</tr>
</table>
<br />

<h3><?php echo __('1.0 COURSE DESCRIPTION');?></h3>
<?php if (!empty($course['Synopsis'])):
		
	$i = 0;
	foreach ($course['Synopsis'] as $synopsis): ?>
		
		<div class="comment_div">
			<?php echo $synopsis['description'];?>
			<br>
			<span class="comment_actions">
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'synopses', 'action' => 'edit', $synopsis['id'],$this->params['pass']['0'],$this->params['pass']['1']));	
				  echo '&nbsp';
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'synopses', 'action' => 'delete', $synopsis['id'],$this->params['pass']['0'],$this->params['pass']['1']), null, __('Are you sure you want to delete # %s?', $synopsis['id'])); 
				  }
				  ?>
			</span>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Synopsis'), array('controller' => 'synopses', 
				'action' => 'add', $course['Course']['id'],$this->params['pass']['1']
		));?> 
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />

	<h3><?php echo __('2.0 COURSE LEARNING OUTCOMES');?></h3>
	<?php if (!empty($course['Outcome'])):?>
	<p> At the end of this course, the students should be able to: </p>
	<ol id="outcome-list">
		<?php foreach ($course['Outcome'] as $outcome): ?>
		<li id='outcome_<?php echo $outcome['id']?>' class='comment_div'>
			<?php echo $outcome['description'];
				  ?>
				  <span class="comment_actions">
				  <?php
				  if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'outcomes', 'action' => 'edit', $outcome['id'],$this->params['pass']['0'],$this->params['pass']['1']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'outcomes', 'action' => 'delete', $outcome['id'],$course['Course']['id'],$this->params['pass']['1']), null, __('Are you sure you want to delete # %s?', $outcome['id'])); 
				  }
				  ?>
				  </span>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
	$this->Js->get('#outcome-list');
	$this->Js->sortable(array(
	'complete' => '$.post("/outcomes/reorder", $("#outcome-list").sortable("serialize"))',
	));				
	endif; 
	?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Outcome'), array('controller' => 'outcomes', 'action' => 'add',$course['Course']['id'],$this->params['pass']['1']
	));?>	
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />

	<h3><?php echo __('3.0 METHOD OF INSTRUCTION');?></h3>
	<?php if (!empty($course['Instruction'])):?>
	<ol id="instruction-list">
		<?php foreach ($course['Instruction'] as $instruction): ?>
		<li id='instruction_<?php echo $instruction['id']?>' class='comment_div'>
			<?php echo $instruction['name'];?>

				<span class="comment_actions">
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'instructions', 'action' => 'edit', $instruction['id'],$course['Course']['id'],$this->params['pass']['1']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'instructions', 'action' => 'delete', $instruction['id'],$course['Course']['id'],$this->params['pass']['1']), null, __('Are you sure you want to delete # %s?', $instruction['id'])); 
				}
				?>
				</span>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
	$this->Js->get('#instruction-list');
	$this->Js->sortable(array(
	'complete' => '$.post("/instructions/reorder", $("#instruction-list").sortable("serialize"))',
	));				

	endif; 
	?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Method of Instruction'), array('controller' => 'instructions', 'action' => 'add', $course['Course']['id'],$this->params['pass']['1']
		));?>	
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />
	<h3><?php echo __('4.0 CONTENT');?></h3>
		<?php
		if(!empty($nodelist)) {

    	foreach ($nodelist_array AS $nodelistId => $nodelist):
    	?>
    	<div class="comment_div">
    	<?php
		echo $nodelist['Content']['number'] . '	 ';
    	echo $nodelist['Content']['path'];
		?>
			<span class="comment_actions">
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'contents', 'action' => 'edit', $nodelist['Content']['id'],$course['Course']['id'],$this->params['pass']['1']));

				  echo '&nbsp';

 				  echo $this->Html->link("Up", array('controller' => 'contents', 'action'=>'moveup', $nodelist['Content']['id'],1,'?' => array('course_id'=>$course['Course']['id'])),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Move Up the Tree'));

				  echo '&nbsp';

 				  echo $this->Html->link("Down", array('controller' => 'contents', 'action'=>'movedown', $nodelist['Content']['id'],1,'?' => array('course_id'=>$course['Course']['id'])),array('style'=>'font-weight:lighter;font-size:9px;color:green;','title'=>'Move Down the Tree'));

 				  echo '&nbsp';

				  echo $this->Form->postLink(__('Delete'), array('controller' => 'contents', 'action' => 'delete', $nodelist['Content']['id'],$course['Course']['id'],$this->params['pass']['1']), null, __('Are you sure you want to delete # %s?', $nodelist['Content']['id'])); 
				}
				?>
			</span>
		</div>
		<?php
		endforeach;
		}
		?>
<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add', $course['Course']['id'],$this->params['pass']['1']
		));
		?>
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />

	<h3><?php echo __('5.0 ASSESSMENT');?></h3>
	<p> Student will be assessed as follows: </p>
	<?php 

	if (!empty($course['Assessment'])):		
		$total_continuous = 0;
		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 1) {
				$total_continuous += $assessment['percentage'];
			}
		endforeach;

		echo '<table class="adminlist">';
		echo '<thead>';
		echo '<tr><th> Type of assessment </th>';
		echo '<th>Number of assessment </th>';
		echo '<th> Percentage (%) </th><th> &nbsp; </th></tr>';
		echo '</thead>';

		echo '<tbody>';

		// echo '<colspan="2"> Continous Assessment (' . $total_continuous . '%)</td></tr>';

		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 1) {
				echo '<tr class="comment_div"><td>' . $assessment['name'] . 
					 '</td><td align="center">' . $assessment['total'] .
					 '</td><td align="center">' . $assessment['percentage'] .
					 '% </td>';
		?>

				<td>
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'assessments', 'action' => 'edit', $assessment['id']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'assessments', 'action' => 'delete', $assessment['id'],'?' => array('course_id'=>$course['Course']['id'])), null, __('Are you sure you want to delete # %s?', $assessment['id'])); 
				} else {
					echo "&nbsp;";
				}
				?>
				</td>
		<?php
				echo '</td></tr>';
			}
		endforeach;

		echo '<tr><td colspan="4"> &nbsp; </td></tr>';

		foreach($course['Assessment'] as $assessment):
			if($assessment['type'] == 2) {
				echo '<tr class="comment_div"><td> Final Exam ' .
					 '</td><td> &nbsp </td>' .
					 '</td><td align="center">' . $assessment['percentage'] .
					 '% </td>';

				$total_continuous += $assessment['percentage'];
		?>

				<td>
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'assessments', 'action' => 'edit', $assessment['id']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'assessments', 'action' => 'delete', $assessment['id'],'?' => array('course_id'=>$course['Course']['id'])), null, __('Are you sure you want to delete # %s?', $assessment['id'])); 
				}
				?>
				</td>

		<?php


				echo '</td></tr>';
			}
		endforeach;

		echo '<tr><td> &nbsp;</td><td align="center"> TOTAL </td><td align="center">' . $total_continuous . '%</td><td> &nbsp; </td>';
		echo '</tbody></table>';		

	?>
	<?php endif; ?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Assessment'), array(
			'controller' => 'assessments', 
			'action' => 'add',
			$course['Course']['id'],$this->params['pass']['1']
			)
		);?>
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />

	<h3><?php echo __('6.0 TEXTBOOK');?></h3>
	<?php if (!empty($course['Textbook'])):?>
	<ol id="textbook-list">
		<?php foreach ($course['Textbook'] as $textbook): ?>
		<li id='textbook_<?php echo $textbook['id']?>' class='comment_div'>
			<?php 
				echo $textbook['author'] . 
				' (' . $textbook['year'] . '), ' .
				$textbook['title'] . ', ' .
				$textbook['city'] . ': ' .
				$textbook['publisher'] . '.'; 
				?>

				<span class="comment_actions">
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'textbooks', 'action' => 'edit', $textbook['id']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'textbooks', 'action' => 'delete', $textbook['id'],'?' => array('course_id'=>$course['Course']['id'])), null, __('Are you sure you want to delete # %s?', $textbook['id'])); 
				}
				?>
				</span>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
	$this->Js->get('#textbook-list');
	$this->Js->sortable(array(
	'complete' => '$.post("/textbooks/reorder", $("#textbook-list").sortable("serialize"))',
	));				

	endif; 
	?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Textbook'), array(
			'controller' => 'textbooks', 
			'action' => 'add',
			$course['Course']['id'],$this->params['pass']['1']			
		));
		?>
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>
<br />

	<h3><?php echo __('7.0 REFERENCE');?></h3>
	<?php if (!empty($course['Reference'])):?>
	<ol id="reference-list">
		<?php foreach ($course['Reference'] as $reference): ?>
		<li id='reference_<?php echo $reference['id']?>' class='comment_div'>
			<?php 
				echo $reference['author'] . 
				' (' . $reference['year'] . '), ' .
				$reference['title'] . ', ' .
				$reference['city'] . ': ' .
				$reference['publisher'] . '.'; 
				?>

				<span class="comment_actions">
				<?php
				if($course['Course']['submitted'] == 0) {

				  echo $this->Html->link(__('Edit'), array('controller' => 'references', 'action' => 'edit', $reference['id']));
				  echo "&nbsp;";
				  echo $this->Form->postLink(__('Delete'), array('controller' => 'references', 'action' => 'delete', $reference['id'],'?' => array('course_id'=>$course['Course']['id'])), null, __('Are you sure you want to delete # %s?', $reference['id'])); 
				}
				?>
				</span>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
	$this->Js->get('#reference-list');
	$this->Js->sortable(array(
	'complete' => '$.post("/references/reorder", $("#reference-list").sortable("serialize"))',
	));				

	endif; 
	?>

<br />

<?php
if($course['Course']['submitted'] == 0) {
?>

<div class="mc-toolbar" id="toolbar">
<ul>
	<li class="button" id="toolbar-newpeo">
		<?php echo $this->Html->link(__('New Reference'), array(
			'controller' => 'references', 
			'action' => 'add',
			$course['Course']['id'],$this->params['pass']['1']			
			));
		?>
	</li>
</ul>
</div>

<?php
}
?>

<div class="mc-clr"></div>

</div>
<br />

<script>
$(document).ready(function() {

$(".comment_actions").hide();

$(".comment_div").hover(
  function() { $(this).children(".comment_actions").show(); },
  function() { $(this).children(".comment_actions").hide(); }
);
});
</script>
