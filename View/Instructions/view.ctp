<div class="instructions view">
<h2><?php  echo __('Instruction');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instruction['Course']['name'], array('controller' => 'courses', 'action' => 'view', $instruction['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['sort_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instruction'), array('action' => 'edit', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instruction'), array('action' => 'delete', $instruction['Instruction']['id']), null, __('Are you sure you want to delete # %s?', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instruction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
