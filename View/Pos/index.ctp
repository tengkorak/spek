<?php
echo debug($pos);
?>

<div class="pos index">
	<h2><?php echo __('Pos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('program_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($pos as $po): ?>
	<tr>
		<td><?php echo h($po['Po']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($po['Program']['id'], array('controller' => 'programs', 'action' => 'view', $po['Program']['id'])); ?>
		</td>
		<td><?php echo h($po['Po']['description']); ?>&nbsp;</td>
		<td><?php echo h($po['Po']['order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $po['Po']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $po['Po']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $po['Po']['id']), null, __('Are you sure you want to delete # %s?', $po['Po']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Po'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
