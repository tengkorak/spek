<div id="mc-title">
	<h1> Edit Synopsis </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->data['Course']['id'])); ?>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.SynopsisEditForm.submit()" class="toolbar">
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
<?php
	echo $this->Form->input('id');	
	echo $this->Form->hidden('Synopsis.course_id');
?>
<ul class="adminformlist">	
	<?php
		echo "\n<li>";
		echo $this->Form->input('description');
		echo "<li>\n";
	?>
</ul>
</fieldset>
</form>
<br />
