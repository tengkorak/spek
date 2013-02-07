<div id="mc-title">
	<h1> Manage Users </h1>												
	<div class="mc-toolbar" id="toolbar">

	<?php
	if($this->Session->read('Auth.User.group_id') == 1) {
	?>
		<ul>
			<li class="button special" id="toolbar-new">
			<a href="/uhek/users/add" class="toolbar">
			New
			</a>
			</li>

			<li class="divider">
			</li>
		</ul>
	<?php
	}
	?>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
	<div class="mc-clr"></div>
	<table class="adminlist">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('username','Username');?></th>
			<th><?php echo $this->Paginator->sort('fullname','Full name');?></th>
			<th><?php echo $this->Paginator->sort('group_id','Role');?></th>
			<th> Action </th>			
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo strtoupper(h($user['User']['fullname'])); ?>&nbsp;</td>
		<?php
			if($user['User']['group_id'] == 1) {
				echo "<td> Administrator </td>";
			}
			else if($user['User']['group_id'] == 2) {
				echo "<td> Resource Person </td>";
			}
			else if($user['User']['group_id'] == 3) {
				echo "<td> Normal User </td>";
			}
		?>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
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
