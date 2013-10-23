<div id="mc-title">
	<h1>Edit <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->data['Course']['id'],$this->params['pass']['2']
			)); 
			?>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.ContentEditForm.submit()" class="toolbar">
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
<?php
	echo $this->Form->input('id');	
	echo $this->Form->hidden('Content.course_id');
?>
<ul class="adminformlist">	
<?php
echo "\n<li>";
	echo $this->Form->input('number',array('label'=>'Numbering'));
echo "<li>\n";
echo "<li>";
	echo $this->Form->input('description',array('label'=>'Name'));
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
