<div class="faculties view">
<h2><?php  echo __('Faculty');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($faculty['Faculty']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($faculty['Faculty']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acronym'); ?></dt>
		<dd>
			<?php echo h($faculty['Faculty']['acronym']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faculty'), array('action' => 'edit', $faculty['Faculty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Faculty'), array('action' => 'delete', $faculty['Faculty']['id']), null, __('Are you sure you want to delete # %s?', $faculty['Faculty']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Faculties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faculty'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses');?></h3>
	<?php if (!empty($faculty['Course'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Faculty Id'); ?></th>
		<th><?php echo __('Program Id'); ?></th>
		<th><?php echo __('Credit'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Semester'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Requisite'); ?></th>
		<th><?php echo __('Level Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($faculty['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['id'];?></td>
			<td><?php echo $course['name'];?></td>
			<td><?php echo $course['faculty_id'];?></td>
			<td><?php echo $course['program_id'];?></td>
			<td><?php echo $course['credit'];?></td>
			<td><?php echo $course['contact'];?></td>
			<td><?php echo $course['semester'];?></td>
			<td><?php echo $course['status'];?></td>
			<td><?php echo $course['requisite'];?></td>
			<td><?php echo $course['level_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), null, __('Are you sure you want to delete # %s?', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Programs');?></h3>
	<?php if (!empty($faculty['Program'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Faculty Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($faculty['Program'] as $program): ?>
		<tr>
			<td><?php echo $program['name'];?></td>
			<td><?php echo $program['faculty_id'];?></td>
			<td><?php echo $program['id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'programs', 'action' => 'view', $program['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'programs', 'action' => 'edit', $program['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'programs', 'action' => 'delete', $program['id']), null, __('Are you sure you want to delete # %s?', $program['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
