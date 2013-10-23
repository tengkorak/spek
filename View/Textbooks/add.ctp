<div id="mc-title">
	<h1>Add Textbook</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->params['pass']['0'],$this->params['pass']['0']
			)); 
			?>		
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.TextbookAddForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Textbook');?>
<fieldset class="adminform">
<input type="hidden" name="data[Textbook][course_id]" id="TextbookCourseId" value=<?php echo $this->params['pass']['0']; ?> />			
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
