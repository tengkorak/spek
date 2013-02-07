<div id="mc-title">
	<h1>Edit User</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'users', 'action' => 'index'));
			 ?>		
			</li>
			<li class="button special" id="toolbar-add">
			<a href="#" onClick="JavaScript:document.forms.UserEditForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('User');?>
<fieldset class="adminform">
<ul class="adminformlist">	
	<?php
		echo "<li>";
		echo $this->Form->input('fullname');	
		echo "</li>\n";
		echo "<li>";		
		echo $this->Form->input('password');
		echo "</li>\n";
		echo "<li>";		
		echo $this->Form->input('group_id');
		echo "</li>\n";
	?>
	</ul>
	</fieldset>
	</form>
</div>
<br />
