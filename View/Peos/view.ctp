<div class="peos view">
<h2><?php  echo __('Peo');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($peo['Peo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($peo['Peo']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Program'); ?></dt>
		<dd>
			<?php echo $this->Html->link($peo['Program']['name'], array('controller' => 'programs', 'action' => 'view', $peo['Program']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($peo['Peo']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Peo'), array('action' => 'edit', $peo['Peo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Peo'), array('action' => 'delete', $peo['Peo']['id']), null, __('Are you sure you want to delete # %s?', $peo['Peo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Peos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Peo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
