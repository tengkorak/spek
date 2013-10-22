<div id="mc-title">
	<h1> Add Course Description </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->params['pass']['0'],$this->params['pass']['1']
			)); 
			?>		
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.SynopsisAddForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Synopsis');?>
<fieldset class="adminform">
<input type="hidden" name="data[Synopsis][course_id]" id="SynopsisCourseId" value=<?php echo $this->params['pass']['0']; ?> />		

<ul class="adminformlist">	
	<?php
		echo "\n<li>";
		echo $this->Form->input('description');
		echo "<li>\n";
	?>
</ul>
</fieldset>
</form>
</div>
<br />
