<div class="slts index">
	<h2><?php echo __('Slts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('week');?></th>
			<th><?php echo $this->Paginator->sort('f2f');?></th>
			<th><?php echo $this->Paginator->sort('nf2f');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($slts as $slt): ?>
	<tr>
		<td><?php echo h($slt['Slt']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($slt['Course']['name'], array('controller' => 'courses', 'action' => 'view', $slt['Course']['id'])); ?>
		</td>
		<td><?php echo h($slt['Slt']['week']); ?>&nbsp;</td>
		<td><?php echo h($slt['Slt']['f2f']); ?>&nbsp;</td>
		<td><?php echo h($slt['Slt']['nf2f']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $slt['Slt']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slt['Slt']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slt['Slt']['id']), null, __('Are you sure you want to delete # %s?', $slt['Slt']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Slt'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
