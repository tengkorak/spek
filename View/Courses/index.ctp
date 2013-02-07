<div id="mc-title">
	<h1> Courses </h1>												
	<div class="mc-toolbar" id="toolbar">

	<ul>
		<li class="button special" id="toolbar-new">
		<a href="/uhek/courses/add" class="toolbar">
		New
		</a>
		</li>

		<li class="divider">
		</li>
	</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
	<div class="mc-clr"></div>
	<table class="adminlist">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id','Course Code');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('program_id');?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($courses as $course): ?>
	<tr>
		<td><?php echo $this->Html->link($course['Course']['id'], array('action' => 'view', $course['Course']['id']));?>&nbsp;</td>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($course['Program']['id']); ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
	<tr>
        <td colspan="7">
        	<div class="mc-page-count">
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}')
			));
			?>
        	</div>

        	<del class="mc-pagination-container">
			<div class="mc-pagination">
			<div class="page-button">
				<div class="prev">
					<span>
					<?php
					echo $this->Paginator->prev('< ' . __('prev'), array(), null, array('class' => 'prev disabled'));
					?>
					</span>
				</div>
			</div>

			<div class="page-button">
				<div class="prev">
					<span>
					<?php
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
					</span>
				</div>
			</div>

			</div>
		</del>
		</td>
	</tr>
	</tfoot>	
	</table>
</div>
<br />