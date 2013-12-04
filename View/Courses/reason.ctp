<div id="mc-title">
	<h1> Course Disapproval Summary </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->passedArgs[0], $this->passedArgs[1])); ?>						
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<table>
	<tr>
		<td colspan="3">
			<h3> History of disapproval: </h3>
		</td>
	</tr>

	<?php
		foreach($rejects as $reject) {
			echo "<tr><td> Disapproved by: </td><td colspan='2'>" . $reject['User']['fullname'] . "</td></tr>";
			echo "<tr><td> On: </td><td colspan='2'>" . $reject['CourseReject']['created'] . "</td></tr>";
			echo "<tr><td> Reason: <td><td coslpan='2'>" . $reject['CourseReject']['reason'] . "</td></tr>";
			echo "<tr><td colspan='3'> &nbsp; </td></tr>";
		}
	?>


<tr><td colspan="3"> &nbsp; </td></tr>
<tr><td colspan="3"> &nbsp; </td></tr>
</table>					

</div>

<br />