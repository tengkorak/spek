<div id="mc-title">
	<h1>Add <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->data['Course']['id'])); ?>		
			</li>
			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.InstructionEditForm.submit()" class="toolbar">
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

	<?php echo $this->Form->create('Instruction');?>
	<fieldset class="adminform">
	<input type="hidden" name="data[Instruction][course_id]" id="InstructionCourseId" value=<?php echo $this->params['url']['course_id']?> />		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('Instruction.course_id');
	?>
	<ul class="adminformlist">
	<li>	
	<?php
		echo $this->Form->input('name');
	?>
	</li>
	</ul>
	</fieldset>
	</form>
</div>
<br />
