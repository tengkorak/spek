<div class="outcomes view">
<h2><?php  echo __('Outcome');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($outcome['Outcome']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($outcome['Outcome']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($outcome['Course']['name'], array('controller' => 'courses', 'action' => 'view', $outcome['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($outcome['Outcome']['sort_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Outcome'), array('action' => 'edit', $outcome['Outcome']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Outcome'), array('action' => 'delete', $outcome['Outcome']['id']), null, __('Are you sure you want to delete # %s?', $outcome['Outcome']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Outcomes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outcome'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
