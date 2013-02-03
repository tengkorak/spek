<?php
// echo debug($instructions);
// echo debug($assessments);
?>

<div id="mc-title">
	<h1>Add <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->data['Course']['id'])); ?>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.OutcomeEditForm.submit()" class="toolbar">
			Save
			</a>
			</li>

			<li class="divider">
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<?php echo $this->Form->create('Outcome');?>
<div class="width-60 fltlft">
	<fieldset class="adminform">
	<input type="hidden" name="data[Outcome][course_id]" id="OutcomeCourseId" value=<?php echo $this->data['Course']['id']?> />
	
	<h3> Description </h3>
	<ul class="adminformlist">	
	<?php
		echo "\n<li>";
		echo $this->Form->input('description',array(
													'label'=>false,
													'size'=>100
													));
		echo "</li>\n";
	?>
	</ul>
	<h4> Please choose the respective Program Outcome (PO) related to the outcome: </h4>
	<?php
			echo $this->Form->input('Po',array(
				'div' => false,
	            'label' => false,
	            'type' => 'select',
	            'multiple' => 'checkbox',
	            'hiddenFields' => 'false',
	            'options' => $pos,
	            'selected' => $this->Html->value('Pos.Pos'),
	        ));	
	?>

	<h4> Please choose the respective Instructional Method related to the outcome: </h4>
	<?php
			echo $this->Form->input('Instruction',array(
				'div' => false,
	            'label' => false,
	            'type' => 'select',
	            'multiple' => 'checkbox',
	            'hiddenFields' => 'false',
	            'options' => $instructions,
	            'selected' => $this->Html->value('Instructions.Instructions'),
	        ));	
	?>

	<h4> Please choose the respective Assessment related to the outcome: </h4>
	<?php
			echo $this->Form->input('Assessment',array(
				'div' => false,
	            'label' => false,
	            'type' => 'select',
	            'multiple' => 'checkbox',
	            'hiddenFields' => 'false',
	            'options' => $assessments,
	            'selected' => $this->Html->value('Assessments.Assessments'),
	        ));	
	?>

	</fieldset>
</div>
<br />

<div class="width-40 fltrt">
		<h3> Please choose the respective Taxonomy related to the outcome: </h3> 
		<div id="sliders" class="pane-sliders">
			<div style="display:none;">
				<div>
				</div>
			</div>
				<div class="panel">
					<h3 class="pane-toggler title" id="settings">
					<a href="javascript:void(0);">
						<span> Cognitive Domain </span>
					</a>
					</h3>
					<div class="pane-slider content">		
						<fieldset class="panelform">
						<ul class="adminformlist">			
						<li>
		<?php echo $this->Form->checkbox('C1'); ?>
		C1 - Knowledge </li><li>
		<?php echo $this->Form->checkbox('C2'); ?>
		C2 - Comprehension </li><li>
		<?php echo $this->Form->checkbox('C3'); ?>
		C3 - Application </li><li>
		<?php echo $this->Form->checkbox('C4'); ?>
		C4 - Analysis </li><li>
		<?php echo $this->Form->checkbox('C5'); ?>
		C5 - Synthesis </li><li>
		<?php echo $this->Form->checkbox('C6'); ?>
		C6 - Evaluation
		</li>
		</ul>
		</fieldset>
	</div>
</div>
</div>
<br />

		<div id="sliders" class="pane-sliders">
			<div style="display:none;">
				<div>
				</div>
			</div>
			<div class="panel">
				<h3 class="pane-toggler title" id="settings">
				<a href="javascript:void(0);">
					<span> Psychomotor Domain </span>
				</a>
				</h3>
				<div class="pane-slider content">		
					<fieldset class="panelform">
					<ul class="adminformlist">			
					<li>
					<?php echo $this->Form->checkbox('P1'); ?>
					P1 - Perception </li><li>
					<?php echo $this->Form->checkbox('P2'); ?>
					P2 - Set </li><li>
					<?php echo $this->Form->checkbox('P3'); ?>
					P3 - Guided Response </li><li>
					<?php echo $this->Form->checkbox('P4'); ?>
					P4 - Mechanism </li><li>
					<?php echo $this->Form->checkbox('P5'); ?>
					P5 - Complex Overt Response </li><li>
					<?php echo $this->Form->checkbox('P6'); ?>
					P6 - Adaptation </li><li>
					<?php echo $this->Form->checkbox('P7'); ?>
					P7 - Origination
					</li>
					</ul>
					</fieldset>
				</div>
			</div>
		</div>
		<br />

		<div id="sliders" class="pane-sliders">
			<div style="display:none;">
				<div>
				</div>
			</div>
			<div class="panel">
				<h3 class="pane-toggler title" id="settings">
				<a href="javascript:void(0);">
					<span> Affective Domain </span>
				</a>
				</h3>
				<div class="pane-slider content">		
					<fieldset class="panelform">
					<ul class="adminformlist">			
					<li>
					<?php echo $this->Form->checkbox('A1'); ?>
					A1 - Receiving to Phenomena </li><li>
					<?php echo $this->Form->checkbox('A2'); ?>
					A2 - Responding to Phenomena </li><li>
					<?php echo $this->Form->checkbox('A3'); ?>
					A3 - Valuing </li><li>
					<?php echo $this->Form->checkbox('A4'); ?>
					A4 - Organizing Values </li><li>
					<?php echo $this->Form->checkbox('A5'); ?>
					A5 - Internalizing Values
					</li>
					</ul>
					</fieldset>
				</div>
			</div>
		</div>		

</div>
</form>
</div>
<br />