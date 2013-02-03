<?php
// debug($questionTypes);
// debug($outcomes);
?>

<div class="questionTypes index">
	<h2><?php echo __('Question Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('content_id');?></th>
			<th><?php echo $this->Paginator->sort('po_id');?></th>
			<th><?php echo $this->Paginator->sort('outcome_id');?></th>
			<th><?php echo $this->Paginator->sort('slt_id');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('marks');?></th>
			<th><?php echo $this->Paginator->sort('C1');?></th>
			<th><?php echo $this->Paginator->sort('C2');?></th>
			<th><?php echo $this->Paginator->sort('C3');?></th>
			<th><?php echo $this->Paginator->sort('C4');?></th>
			<th><?php echo $this->Paginator->sort('C5');?></th>
			<th><?php echo $this->Paginator->sort('C6');?></th>
			<th><?php echo $this->Paginator->sort('A1');?></th>
			<th><?php echo $this->Paginator->sort('A2');?></th>
			<th><?php echo $this->Paginator->sort('A3');?></th>
			<th><?php echo $this->Paginator->sort('A4');?></th>
			<th><?php echo $this->Paginator->sort('A5');?></th>
			<th><?php echo $this->Paginator->sort('P1');?></th>
			<th><?php echo $this->Paginator->sort('P2');?></th>
			<th><?php echo $this->Paginator->sort('P3');?></th>
			<th><?php echo $this->Paginator->sort('P4');?></th>
			<th><?php echo $this->Paginator->sort('P5');?></th>
			<th><?php echo $this->Paginator->sort('P6');?></th>
			<th><?php echo $this->Paginator->sort('P7');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($questionTypes as $questionType): ?>
	<tr>
		<td><?php echo h($questionType['QuestionType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionType['Content']['description'], array('controller' => 'contents', 'action' => 'view', $questionType['Content']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionType['Po']['description'], array('controller' => 'pos', 'action' => 'view', $questionType['Po']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionType['Outcome']['description'], array('controller' => 'outcomes', 'action' => 'view', $questionType['Outcome']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionType['Slt']['week'], array('controller' => 'slts', 'action' => 'view', $questionType['Slt']['id'])); ?>
		</td>
		<td><?php echo h($questionType['QuestionType']['time']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['marks']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C1']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C2']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C3']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C4']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C5']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['C6']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['A1']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['A2']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['A3']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['A4']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['A5']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P1']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P2']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P3']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P4']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P5']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P6']); ?>&nbsp;</td>
		<td><?php echo h($questionType['QuestionType']['P7']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionType['QuestionType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionType['QuestionType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionType['QuestionType']['id']), null, __('Are you sure you want to delete # %s?', $questionType['QuestionType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Question Type'), array('action' => 'add')); ?></li>
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
