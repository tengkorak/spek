<?
debug($parents);
?>

<div id="mc-title">
	<h1> Add Content </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->params['url']['course_id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.ContentAddForm.submit()" class="toolbar">
			Save
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
<?php
echo $this->Form->create('Content');
?>
<fieldset class="adminform">
<input type="hidden" name="data[Content][course_id]" id="ContentCourseId" value=<?php echo $this->params['url']['course_id']?> />
<ul class="adminformlist">	
<?php
echo "\n<li>";
	echo $this->Form->input('number',array('label'=>'Numbering'));
echo "<li>\n";
echo "<li>";
	echo $this->Form->input('description',array('label'=>'Heading'));
echo "</li>";
echo "<li>";
	echo $this->Form->input('parent_id',array('label'=>'Parent'));
echo "</li>";
echo "<li>";
	echo $this->Form->input('Outcome',array('label'=>'Course Outcome'));
echo "</li>";
?>	
</ul>
</fieldset>
</form>
</div>
<br />
