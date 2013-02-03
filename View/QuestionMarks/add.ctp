<div class="questionMarks form">
<?php echo $this->Form->create('QuestionMark');?>
	<fieldset>
		<legend><?php echo __('Add Question Mark'); ?></legend>
	<?php
		echo $this->Form->input('content_id');
		echo $this->Form->input('po_id');
		echo $this->Form->input('outcome_id');
		echo $this->Form->input('slt_id');
		echo $this->Form->input('time');
		echo $this->Form->input('marks');
		echo $this->Form->input('C1');
		echo $this->Form->input('C2');
		echo $this->Form->input('C3');
		echo $this->Form->input('C4');
		echo $this->Form->input('C5');
		echo $this->Form->input('C6');
		echo $this->Form->input('A1');
		echo $this->Form->input('A2');
		echo $this->Form->input('A3');
		echo $this->Form->input('A4');
		echo $this->Form->input('A5');
		echo $this->Form->input('P1');
		echo $this->Form->input('P2');
		echo $this->Form->input('P3');
		echo $this->Form->input('P4');
		echo $this->Form->input('P5');
		echo $this->Form->input('P6');
		echo $this->Form->input('P7');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Question Marks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pos'), array('controller' => 'pos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Po'), array('controller' => 'pos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outcomes'), array('controller' => 'outcomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outcome'), array('controller' => 'outcomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Slts'), array('controller' => 'slts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slt'), array('controller' => 'slts', 'action' => 'add')); ?> </li>
	</ul>
</div>
