<div id="mc-title">
	<h1>Edit <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->data['Course']['id'])); ?>		
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.CourseEditForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Course');?>
<fieldset class="adminform">
<?php
	echo $this->Form->hidden('Course.id');	
	echo $this->Form->hidden('Course.program_id');
?>	
<ul class="adminformlist">	
	<?php
		echo "\n<li>";
		echo $this->Form->input('name');
		echo "<li>\n";
		echo "<li>";
		echo $this->Form->input('faculty_id', array(
												   'label'=>'Faculty (Owner)',
												   'type'=>'select'
												   )
						  );
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('credit', array(
										'label'=>'Credit Units', 
										'type'=>'select', 
										'options'=> array(
														  '1'=>'1.0',
														  '2'=>'2.0',
														  '3'=>'3.0',
														  '4'=>'4.0',
														  '5'=>'5.0')
										)
							);
		echo "</li>\n";	
		echo "<li>";
		echo $this->Form->input('contact');
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('semester', array(
										'label'=>'Semester', 
										'type'=>'select', 
										'options'=> array(
														  '1'=>'1',
														  '2'=>'2',
														  '3'=>'3',
														  '4'=>'4',
														  '5'=>'5',
														  '6'=>'6',
														  '7'=>'7',
														  '8'=>'8',
														  '9'=>'9',
														  '10'=>'10',
														  )
										)
							);
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('status', array(
										'label'=>'Status', 
										'type'=>'select', 
										'options'=> array(
														  '1'=>'University Courses',
														  '2'=>'Core',
														  '3'=>'Elective'
														  )
										)
							);	
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('requisite', array(
										'label'=>'Prerequisite', 
										'type'=>'select', 
										'options'=> array(
														  '1'=>'Yes',
														  '2'=>'None'
														  )
										)
							);
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('level_id');
		echo "</li>\n";
	?>
</ul>
</fieldset>
</form>
</div>
<br />
