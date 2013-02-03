<div id="mc-title">
	<h1> Programs </h1>												
	<div class="mc-toolbar" id="toolbar">

	<?php
	if($this->Session->read('Auth.User.group_id') == 1) {
	?>
		<ul>
			<li class="button special" id="toolbar-new">
			<a href="/uhek/programs/add" class="toolbar">
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
			<th><?php echo $this->Paginator->sort('id','Program Code');?></th>
			<th><?php echo $this->Paginator->sort('name_be','Name (English)');?></th>
			<th><?php echo $this->Paginator->sort('name_bm','Name (Malay)');?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($programs as $program): ?>
	<tr>
		<td><?php echo $this->Html->link($program['Program']['id'], array('action' => 'view', $program['Program']['id'])); ?>&nbsp;</td>		
		<td><?php echo h( strtoupper( $program['Program']['name_be']) ); ?>&nbsp;</td>
		<td><?php echo h( strtoupper( $program['Program']['name_bm']) ); ?>&nbsp;</td>
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