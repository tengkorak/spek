<div class="courses index">
	<h2><?php echo __('Courses');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','Course Code');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('program_id');?></th>
			<th><?php echo $this->Paginator->sort('credit');?></th>
			<th><?php echo $this->Paginator->sort('contact');?></th>
			<th><?php echo $this->Paginator->sort('semester');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('requisite');?></th>
			<th><?php echo $this->Paginator->sort('level_id');?></th>
	</tr>
	<?php
	foreach ($courses as $course): ?>
	<tr>
		<td><?php echo $this->Html->link($course['Course']['id'], array('action' => 'view', $course['Course']['id']));?>&nbsp;</td>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($course['Program']['id']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['credit']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['contact']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['semester']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['status']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['requisite']); ?>&nbsp;</td>
		<td><?php echo h($course['Level']['name']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
	</ul>
</div>
