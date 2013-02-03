<div class="outcomes index">
	<h2><?php echo __('Outcomes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('sort_order');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($outcomes as $outcome): ?>
	<tr>
		<td><?php echo h($outcome['Outcome']['id']); ?>&nbsp;</td>
		<td><?php echo h($outcome['Outcome']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($outcome['Course']['name'], array('controller' => 'courses', 'action' => 'view', $outcome['Course']['id'])); ?>
		</td>
		<td><?php echo h($outcome['Outcome']['sort_order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $outcome['Outcome']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $outcome['Outcome']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $outcome['Outcome']['id']), null, __('Are you sure you want to delete # %s?', $outcome['Outcome']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Outcome'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
