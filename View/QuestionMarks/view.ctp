<div class="questionMarks view">
<h2><?php  echo __('Question Mark');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionMark['Content']['description'], array('controller' => 'contents', 'action' => 'view', $questionMark['Content']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Po'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionMark['Po']['description'], array('controller' => 'pos', 'action' => 'view', $questionMark['Po']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionMark['Outcome']['description'], array('controller' => 'outcomes', 'action' => 'view', $questionMark['Outcome']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slt'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionMark['Slt']['week'], array('controller' => 'slts', 'action' => 'view', $questionMark['Slt']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marks'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['marks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C1'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C2'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C3'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C4'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C5'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('C6'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['C6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('A1'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['A1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('A2'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['A2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('A3'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['A3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('A4'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['A4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('A5'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['A5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P1'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P2'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P3'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P4'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P5'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P6'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('P7'); ?></dt>
		<dd>
			<?php echo h($questionMark['QuestionMark']['P7']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question Mark'), array('action' => 'edit', $questionMark['QuestionMark']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question Mark'), array('action' => 'delete', $questionMark['QuestionMark']['id']), null, __('Are you sure you want to delete # %s?', $questionMark['QuestionMark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Marks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Mark'), array('action' => 'add')); ?> </li>
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
