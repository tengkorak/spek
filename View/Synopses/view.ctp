<div class="synopses view">
<h2><?php  echo __('Synopsis');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($synopsis['Synopsis']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($synopsis['Synopsis']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($synopsis['Course']['name'], array('controller' => 'courses', 'action' => 'view', $synopsis['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Synopsis'), array('action' => 'edit', $synopsis['Synopsis']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Synopsis'), array('action' => 'delete', $synopsis['Synopsis']['id']), null, __('Are you sure you want to delete # %s?', $synopsis['Synopsis']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Synopses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Synopsis'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
