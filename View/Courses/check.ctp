<style type="text/css">
ul 
#toolbar-jsus,
#toolbar-jsub,
#toolbar-jsup {
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
}
ul li 
{
    display: block;
    position: relative;
    float: left;
}
li ul {
    display: none;
}
li a 
#toolbar-jsus,
#toolbar-jsub, 
#toolbar-jsup {
    display: block;
    text-decoration: none;
    padding: 1px;
    margin-left: 1px;
    white-space: nowrap;
}
li:hover ul {
    display: block;
    position: absolute;
}
li:hover li {
    float: none;
    font-size: 11px;
}
</style>
<div id="mc-title">
	<h1> Course Summary </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'view', $this->passedArgs[1])); ?>						
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<table>
	<tr>
		<td colspan="2">
			<h3> History of submission: </h3>
		</td>
	</tr>

	<?php
		foreach($submits as $submit) {
			echo "<tr><td> Submitted by: </td><td>" . $submit['User']['fullname'] . "</td></tr>";
			echo "<tr><td> On: </td><td>" . $submit['CourseSubmit']['created'] . "</td></tr>";
			echo "<tr><td colspan='2'> &nbsp; </td></tr>";
		}
	?>

	<tr>
		<td colspan="2">
			<h3> Summary: </h3>
		</td>
	</tr>	

	<?php
		foreach($courses as $course) {
			echo "<tr><td> Course Descriptions </td><td>: " . $course['Course']['synopsis_count'] . "</td></tr>";
			echo "<tr><td> Course Outcomes </td><td>: " . $course['Course']['outcome_count'] . "</td></tr>";
			echo "<tr><td> Course Instructions </td><td>: " . $course['Course']['instruction_count'] . "</td></tr>";
			echo "<tr><td> Course Contents </td><td>: " . $course['Course']['content_count'] . "</td></tr>";
			echo "<tr><td> Assessments </td><td>: " . $course['Course']['assessment_count'] . "</td></tr>";
			echo "<tr><td> Textbooks </td><td>: " . $course['Course']['textbook_count'] . "</td></tr>";
			echo "<tr><td> References </td><td>: " . $course['Course']['reference_count'] . "</td></tr>";
		}
	?>

<tr><td colspan="2"> &nbsp; </td></tr>
<tr><td colspan="2"> &nbsp; </td></tr>

<tr>
	<td>

	<?php echo $this->Html->link(__('View Course Details'), array('controller' => 'courses', 'action' => 'view',$course['Course']['id'],$this->params['pass']['1'])); ?>

	or 

	</td>
	<td>

	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button special" id="toolbar-back">
			<?php echo $this->Html->link(__('Approve'), array('controller' => 'courses', 'action' => 'approved', $course['Course']['id'],$this->params['pass']['1'])); ?>						
			</li>
		</ul>
	</div>	

	</td>
</tr>
</table>					

</div>

<br />

<script>
$(document).ready(function() {

$(".comment_actions").hide();

$(".comment_div").hover(
  function() { $(this).children(".comment_actions").show(); },
  function() { $(this).children(".comment_actions").hide(); }
);
});
</script>
