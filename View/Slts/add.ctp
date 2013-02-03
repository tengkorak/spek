<div id="mc-title">
	<h1>Add Student Learning Time (SLT) </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array(
															'controller' => 'slts', 
															'action' => 'view', 
															$this->passedArgs[0])); ?>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.SltAddForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Slt');?>
	<fieldset class="adminform">
	<input type="hidden" name="data[Slt][course_id]" id="SltCourseId" value=<?php echo $this->passedArgs[0]; ?> />
	<input type="hidden" name="data[Slt][week]" id="SltWeek" value=<?php echo $this->passedArgs[1]; ?> />	
	
	<h3> Week <?php echo $this->passedArgs[1]; ?></h3>
	<h4> Please choose the respective topic for week <?php echo $this->passedArgs[1]; ?>: </h4>
	<?php
	        $options=$contents;
			$attributes=array('legend'=>false, 'separator'=>'<br />');
			echo $this->Form->radio('Content',$options,$attributes);
	?>

	<ul class="adminformlist">	
	<li>
	<h4> Please enter respective hour for Face to Face (F2F) and Non Face to Face (NF2F): </h4>

	<?php
	echo $this->Form->input('f2f', array(
										'label' => "Face to Face (F2F)"
										));
	?>
	
	</li>
	<li>

	<?php
	echo $this->Form->input('nf2fg', array(
										'label' => "Non Face to Face Guided (NF2FG)"
										));
	?>
	</li>

	<?php
	echo $this->Form->input('nf2fng', array(
										'label' => "Non Face to Face Non Guided (NF2FNG)"
										));
	?>
	</li>
	</ul>
	</fieldset>
<br />
</form>
</div>
<br />