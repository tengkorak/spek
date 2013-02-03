<div class="textbooks view">
<h2><?php  echo __('Textbook');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($textbook['Course']['name'], array('controller' => 'courses', 'action' => 'view', $textbook['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edition'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['edition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publisher'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['publisher']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($textbook['Textbook']['sort_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Textbook'), array('action' => 'edit', $textbook['Textbook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Textbook'), array('action' => 'delete', $textbook['Textbook']['id']), null, __('Are you sure you want to delete # %s?', $textbook['Textbook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Textbooks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Textbook'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
