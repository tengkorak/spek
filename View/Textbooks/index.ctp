<div class="textbooks index">
	<h2><?php echo __('Textbooks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('author');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('edition');?></th>
			<th><?php echo $this->Paginator->sort('publisher');?></th>
			<th><?php echo $this->Paginator->sort('sort_order');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($textbooks as $textbook): ?>
	<tr>
		<td><?php echo h($textbook['Textbook']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($textbook['Course']['name'], array('controller' => 'courses', 'action' => 'view', $textbook['Course']['id'])); ?>
		</td>
		<td><?php echo h($textbook['Textbook']['author']); ?>&nbsp;</td>
		<td><?php echo h($textbook['Textbook']['year']); ?>&nbsp;</td>
		<td><?php echo h($textbook['Textbook']['title']); ?>&nbsp;</td>
		<td><?php echo h($textbook['Textbook']['edition']); ?>&nbsp;</td>
		<td><?php echo h($textbook['Textbook']['publisher']); ?>&nbsp;</td>
		<td><?php echo h($textbook['Textbook']['sort_order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $textbook['Textbook']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $textbook['Textbook']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $textbook['Textbook']['id']), null, __('Are you sure you want to delete # %s?', $textbook['Textbook']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Textbook'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
