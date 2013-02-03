<div id="mc-title">
	<h1>Add <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<a href="/uhek/programs/index" class="toolbar">
			Back
			</a>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.ProgramAddForm.submit()" class="toolbar">
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

	<?php echo $this->Form->create('Program');?>
	<fieldset class="adminform">
	<ul class="adminformlist">

	<?php
		echo "\n<li>";
		echo $this->Form->input('Program.id', array(
												  'label'=>'Program Code',
												  'type'=>'text',
												  'class'=>'inputbox',
												  'div'=>false		
												  )
						 );
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('Program.name_be', array(
												  'label'=>'Program Name (English)',
												  'type'=>'text',
												  'class'=>'inputbox',
												  'size'=>'100',
												  'div'=>false
												  )
						 );
		echo "</li>\n";
		echo "<li>";						 	
		echo $this->Form->input('Program.name_bm', array(
												  'label'=>'Program Name (Malay)',
												  'type'=>'text',
												  'class'=>'inputbox',
												  'size'=>'100',
												  'div'=>false				  
												  )
						 );			
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('faculty_id', array(
												'div'=>false
												));
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('level_id', array(
												'div'=>false
												));
		echo "</li>\n";
	?>
	</ul>
	</fieldset>
</form>
</div>
