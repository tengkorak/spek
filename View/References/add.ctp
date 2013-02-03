<div id="mc-title">
	<h1>Add Reference</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->params['url']['course_id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.ReferenceAddForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Reference');?>
<fieldset class="adminform">
<input type="hidden" name="data[Reference][course_id]" id="ReferenceCourseId" value=<?php echo $this->params['url']['course_id']?> />			
<ul class="adminformlist">	
	<?php
		echo "\n<li>";
			echo $this->Form->input('author');
		echo "</li>\n";
		echo "<li>";
			echo $this->Form->input('year');
		echo "</li>\n";
		echo "<li>";
			echo $this->Form->input('title');
		echo "</li>\n";
		echo "<li>";
			echo $this->Form->input('city');
		echo "</li>\n";
		echo "<li>";
			echo $this->Form->input('publisher');
		echo "</li>\n";
	?>
</ul>
</fieldset>
</form>
</div>
<br />