<div class="assessments view">
<h2><?php  echo __('Assessment');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($assessment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $assessment['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percentage'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['percentage']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Assessment'), array('action' => 'edit', $assessment['Assessment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Assessment'), array('action' => 'delete', $assessment['Assessment']['id']), null, __('Are you sure you want to delete # %s?', $assessment['Assessment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Assessments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Assessment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
