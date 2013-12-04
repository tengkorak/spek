<div id="mc-title">
	<h1> Course Disapproval </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'check', $this->passedArgs[0],$this->passedArgs[1])); ?>						
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>

<div class="coursesReject form">
<?php echo $this->Form->create('CourseReject');?>
	<fieldset class="adminform">
	<?php
		echo $this->Form->input('reason', array(
												'label'=>'Please provide reason for disapproval:&nbsp;&nbsp;',
												));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

</div>