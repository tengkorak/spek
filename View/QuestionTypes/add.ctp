<?php
// debug($contents);
?>

<div id="mc-title">
	<h1>Add JSU (Assessment Tools) </h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php 
			if($this->passedArgs[1] == 1)
				$view = 'jsu';
			else if($this->passedArgs[1] == 2)
				$view = 'jsub';
			else if($this->passedArgs[1] == 3)
				$view = 'jsup';				

			echo $this->Html->link(__('Back'), array(
															'controller' => 'questionTypes', 
															'action' => $view, 
															$this->passedArgs[0])); ?>
			</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.QuestionTypeAddForm.submit()" class="toolbar">
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
<?php echo $this->Form->create('QuestionType');?>
	<fieldset class="adminform">	
		<input type="hidden" name="data[QuestionType][course_id]" id="QuestionTypeCourseId" value=<?php echo $this->passedArgs[0]; 	?> />
		<table cellpading="5" cellspacing="5">
		<?php
		echo '<tr>';
		echo '<td> Content </td>';
		echo '<td>';
		echo $this->Form->input('content_id', array(
												  'label'=>'',
												  'type'=>'select'
												  )
						 );
		echo '</td></tr>';
		echo '<tr>';
		echo '<td> Question Type </td>';
		echo '<td colspan=2>';
		echo $this->Form->input('type', array(
												  'label'=>'',
												  'type'=>'text'
												  )
						 );
		echo '</td></tr>';
		echo '<tr>';
		echo '<td> Marks </td>';
		echo '<td>';
		echo $this->Form->input('marks', array(
												  'label'=>'',
												  'type'=>'text'
												  )
						 );
		echo '</td></tr>';
		echo '<tr>';
		echo '<td><br><strong> Cognitive </strong><br></td>';
		echo '<td>';

	        $options=array(1,2,3,4,5,6);
			$attributes=array('legend'=>false, 'separator'=>' ');
			echo $this->Form->radio('cognitive',$options,$attributes);
	
	    echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><br><strong> Affective </strong><br></td>';
		echo '<td>';

	        $options=array(1,2,3,4,5);
			$attributes=array('legend'=>false, 'separator'=>' ');
			echo $this->Form->radio('affective',$options,$attributes);
	
	    echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><br><strong> Psychomotor </strong><br></td>';
		echo '<td>';

	        $options=array(1,2,3,4,5,6,7);
			$attributes=array('legend'=>false, 'separator'=>' ');
			echo $this->Form->radio('psychomotor',$options,$attributes);
	
	    echo '</td>';
		echo '</tr>';
		echo '</table>';
	?>
</fieldset>
</form>
</div>
</br>
