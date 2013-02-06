<style type="text/css">
#navlist li
{
display: inline;
padding-right: 20px;
}
</style>

<div id="mc-title">
	<h1>Add <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'view', $this->params['url']['program_id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.PoAddForm.submit()" class="toolbar">
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


	<?php echo $this->Form->create('Po');?>
	<fieldset class="adminform">
	<input type="hidden" name="data[Po][program_id]" id="PoProgramId" value=<?php echo $this->params['url']['program_id']?> />				
	<h3> Description </h3>
	<ul class="adminformlist">	
	<?php
	echo "\n<li>";
	echo $this->Form->input('description',array('label'=>false));
	echo "</li>";
	echo "</ul>";

	echo "<h3> Please choose a respective PEO for the PO: </h3>";

			echo $this->Form->input('Peo',array(
				'div' => false,
	            'label' => false,
	            'type' => 'select',
	            'multiple' => 'checkbox',
	            'hiddenFields' => 'false',
	            'options' => $peos,
	            'selected' => $this->Html->value('Peos.Peos'),
	        ));
	?>	

	<h3> Please choose a respective MOHE Learning Outcome (LO): </h3>
	<ul class="adminformlist">
	<li>
		<?php echo $this->Form->checkbox('lo1'); ?>
		LO1 - Knowledge Specific Area - Content
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo2'); ?>
		LO2 - Practical Skills
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo3'); ?>
		LO3 - Thinking and Scientific Skills
	</li>
	<li>
		<ul class="hidden hidden_PoLo3" id="navlist" style="padding-left: 40px">
		<li>
			Critical Thinking and Problem Solving (CTPS) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3,4,5,6,7);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['ctps']);
				echo $this->Form->radio('ctps',$options,$attributes);
		?>
		</li></ul>
	</li>	
	<li>
		<?php echo $this->Form->checkbox('lo4'); ?>
		LO4 - Communication Skills
	</li>
	<li>
		<ul class="hidden hidden_PoLo4" id="navlist" style="padding-left: 40px">
		<li>
			Communication Skills (CS) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3,4,5,6,7,8);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['cs']);
				echo $this->Form->radio('cs',$options,$attributes);
		?>
		</li></ul>
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo5'); ?>
		LO5 - Social Skills, Teamwork and Responsibilities
	</li>
	<li>
		<ul class="hidden hidden_PoLo5" id="navlist" style="padding-left: 40px">
		<li>
			Teamwork Skills (TS) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3,4,5);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['ts']);
				echo $this->Form->radio('ts',$options,$attributes);
		?>
		</li></ul>
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo6'); ?>
		LO6 - Values, Ethics, Moral and Professionalism
	</li>
	<li>
		<ul class="hidden hidden_PoLo6" id="navlist" style="padding-left: 40px">
		<li>
			Ethics and Moral Professionalisme (EM) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['em']);
				echo $this->Form->radio('em',$options,$attributes);
		?>
		</li></ul>
	</li>	
	<li>
		<?php echo $this->Form->checkbox('lo7'); ?>
		LO7 - Information Management and Lifelong Learning
	</li>
	<li>
		<ul class="hidden hidden_PoLo7" id="navlist" style="padding-left: 40px">
		<li>
			Life-long Learning and Information Management (LL) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['ll']);
				echo $this->Form->radio('ll',$options,$attributes);
		?>
		</li></ul>
	</li>	
	<li>
		<?php echo $this->Form->checkbox('lo8'); ?>
		LO8 - Management and Entrepreneurship
	</li>
	<li>
		<ul class="hidden hidden_PoLo8" id="navlist" style="padding-left: 40px">
		<li>
			Entrepreneurial Skills (ES) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3,4);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['es']);
				echo $this->Form->radio('es',$options,$attributes);
		?>
		</li></ul>
	</li>	
	<li>
		<?php echo $this->Form->checkbox('lo9'); ?>
		LO9 - Leadership Skills
	</li>
	<li>
		<ul class="hidden hidden_PoLo9" id="navlist" style="padding-left: 40px">
		<li>
			Leadersgip Skills (LS) <br>
			<strong> Level </strong><br>
		<?php
			    $options=array(1,2,3,4);
				$attributes=array('legend'=>false, 
								  'separator'=>'</li><li>',
								  'label' => false,
								  'checked' => $data['Po']['ls']);
				echo $this->Form->radio('ls',$options,$attributes);
		?>
		</li></ul>
	</li>	
	</ul>
	</fieldset>
	</form>
</div>
<br />
<script type="text/javascript">
$('.hidden').css({
    'display': 'none'
});

$(':checkbox').change(function() {
    var option = 'hidden_' + $(this).attr('id');
    if ($('.' + option).css('display') == 'none') {
        $('.' + option).fadeIn();
    }
    else {
        $('.' + option).fadeOut();
    }
});
</script>

