<div class="references view">
<h2><?php  echo __('Reference');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reference['Course']['name'], array('controller' => 'courses', 'action' => 'view', $reference['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edition'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['edition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publisher'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['publisher']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($reference['Reference']['sort_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reference'), array('action' => 'edit', $reference['Reference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reference'), array('action' => 'delete', $reference['Reference']['id']), null, __('Are you sure you want to delete # %s?', $reference['Reference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List References'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reference'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
