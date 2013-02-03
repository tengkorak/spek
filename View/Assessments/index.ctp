<div class="assessments index">
	<h2><?php echo __('Assessments');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th><?php echo $this->Paginator->sort('percentage');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($assessments as $assessment): ?>
	<tr>
		<td><?php echo h($assessment['Assessment']['id']); ?>&nbsp;</td>
		<td><?php echo h($assessment['Assessment']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($assessment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $assessment['Course']['id'])); ?>
		</td>
		<td><?php echo h($assessment['Assessment']['type']); ?>&nbsp;</td>
		<td><?php echo h($assessment['Assessment']['total']); ?>&nbsp;</td>
		<td><?php echo h($assessment['Assessment']['percentage']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $assessment['Assessment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $assessment['Assessment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $assessment['Assessment']['id']), null, __('Are you sure you want to delete # %s?', $assessment['Assessment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Assessment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
