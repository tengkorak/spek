<div id="mc-title">
	<h1>Add Assessment</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'courses', 'action' => 'view', $this->params['url']['course_id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.AssessmentAddForm.submit()" class="toolbar">
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

<?php echo $this->Form->create('Assessment');?>
<fieldset class="adminform">
<input type="hidden" name="data[Assessment][course_id]" id="AssessmentCourseId" value=<?php echo $this->params['url']['course_id']?> />
<ul class="adminformlist">
	<?php
		echo "\n<li>";
		echo $this->Form->input('type', array(
										'label'=>'Assessment', 
										'type'=>'select', 
										'options'=> array(
														  '1'=>'Continuous Assessment',
														  '2'=>'Final Exam'
														  )
										)
							);
		echo "<li>\n";
		echo "<li>";
		echo $this->Form->input('name', array(
											'label'=>'Assessment type',
											'div' => 'input assessment name'
											)
								);		
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('total', array(
											'div' => 'input select total',
											'label' => 'Total number of assessment',
											'type' => 'select',
											'options' => array(
															'1' => '1',
															'2' => '2',
															'3' => '3',
															'4' => '4',
															'5' => '5',
															'6' => '6',
															'7' => '7',
															'8' => '8',
															'9' => '9',
															'10' => '10'
															)
											)
							    );
		echo "</li>\n";
		echo "<li>";
		echo $this->Form->input('percentage', array(
											'label' => 'Total Percentage (%)',
											'type' => 'select',
											'options' => array(
															'5' => '5',
															'10' => '10',
															'15' => '15',
															'20' => '20',
															'25' => '25',
															'30' => '30',
															'35' => '35',
															'40' => '40',
															'45' => '45',
															'50' => '50',
															'55' => '55',
															'60' => '60',
															'65' => '65',
															'70' => '70',
															'75' => '75',
															'80' => '80',
															'85' => '85',
															'90' => '90',
															'95' => '95',
															'100' => '100'
															)
											)
							    );
		echo "<li>\n";
	?>
	</ul>
	</fieldset>
	</form>
</div>
<br />

<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
    $("#AssessmentType").change(function(){
 
        if ($(this).val() == "1" ) {
            $(".name").slideDown("fast"); //Slide Down Effect
            $(".total").slideDown("fast");
        } else {
            $(".name").slideUp("fast");    //Slide Up Effect
            $(".total").slideUp("fast");
        }
    });
});    
//]]>
</script>