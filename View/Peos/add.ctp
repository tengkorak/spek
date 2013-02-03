<div id="mc-title">
	<h1>Add <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'view', $this->params['url']['program_id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.PeoAddForm.submit()" class="toolbar">
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

	<?php echo $this->Form->create('Peo');?>
	<fieldset class="adminform">
	<ul class="adminformlist">
	<input type="hidden" name="data[Peo][program_id]" id="PeoProgramId" value=<?php echo $this->params['url']['program_id']?> />		

	<?php
		echo "\n<li>";
		echo $this->Form->input('description');
		echo "</li>\n"
	?>
	</ul>
	</fieldset>
	</form>
</div>
<br />
