<div class="pos view">
<h2><?php  echo __('Po');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($po['Po']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Program'); ?></dt>
		<dd>
			<?php echo $this->Html->link($po['Program']['name'], array('controller' => 'programs', 'action' => 'view', $po['Program']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($po['Po']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($po['Po']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Po'), array('action' => 'edit', $po['Po']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Po'), array('action' => 'delete', $po['Po']['id']), null, __('Are you sure you want to delete # %s?', $po['Po']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Po'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
