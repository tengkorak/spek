<?php
$group_id = $this->Session->read('Auth.User.group_id');
$user_id = $this->Session->read('Auth.User.id');
?>

<div id="mc-title">
	<h1> Programs </h1>												
	<div class="mc-toolbar" id="toolbar">

	<?php
	if($group_id == 1) {
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


	<?php
	if($group_id != 2) {
	?>

	<div class="mc-clr"></div>
	<h3> KPP/PP </h3>
	<table class="adminlist">
	<thead>
		<tr>
			<th> Program Code </th>
			<th> Name (English) </th>
			<th> Name (Malay) </th>
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($programs))
	{
		foreach ($programs as $program): ?>
		<tr>
			<td><?php echo $this->Html->link($program['Program']['id'], array('action' => 'view', $program['Program']['id'])); ?>&nbsp;</td>		
			<td><?php echo h( strtoupper( $program['Program']['name_be']) ); ?>&nbsp;</td>
			<td><?php echo h( strtoupper( $program['Program']['name_bm']) ); ?>&nbsp;</td>
		</tr>
		<?php 
		endforeach;
	}
	?>
	</tbody>
	<tfoot>
	<tr>
        <td colspan="7">
		</td>
	</tr>
	</tfoot>	
	</table>

	<?php
	}
	?>

	<div class="mc-clr"></div>
	<h3> RP </h3>
	<table class="adminlist">
	<thead>
		<tr>
			<th> Program Code </th>
			<th> Name (English) </th>
			<th> Name (Malay) </th>
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($courses))
	{	
		$i = 0;
		foreach ($courses as $course):
		?>
		<tr>
			<td><?php echo $this->Html->link($course['Program']['id'], array(
																			'action' => 'view', 
																			$course['Program']['id']
																			)); ?>
																			&nbsp;
			</td>		
			<td><?php echo h( strtoupper( $course['Program']['name_be']) ); ?>&nbsp;</td>
			<td><?php echo h( strtoupper( $course['Program']['name_bm']) ); ?>&nbsp;</td>
		</tr>
		<?php 
		endforeach;
		$i++;
	}
	?>
	</tbody>
	<tfoot>
	<tr>
        <td colspan="7">
		</td>
	</tr>
	</tfoot>	
	</table>
</div>
<br />