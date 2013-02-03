<div id="mc-title">
	<h1>Edit <?php echo $this->params['controller']; ?></h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button" id="toolbar-new">
			<?php echo $this->Html->link(__('Back'), array('controller' => 'programs', 'action' => 'view', $this->data['Program']['id'])); ?>		</li>

			<li class="button special" id="toolbar-new">
			<a href="#" onClick="JavaScript:document.forms.PoEditForm.submit()" class="toolbar">
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
		<?php echo $this->Form->checkbox('lo4'); ?>
		LO4 - Communication Skills
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo5'); ?>
		LO5 - Social Skills, Teamwork and Responsibilities
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo6'); ?>
		LO6 - Values, Ethics, Moral and Professionalism
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo7'); ?>
		LO7 - Information Management and Lifelong Learning
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo8'); ?>
		LO8 - Management and Entrepreneurship
	</li>
	<li>
		<?php echo $this->Form->checkbox('lo9'); ?>
		LO9 - Leadership Skills
	</li>
	</ul>
	
	<h3> Please choose a respective MOHE Soft Skills (KI): </h3>
	<ul class="adminformlist">
	<li>
		<?php echo $this->Form->checkbox('ss1'); ?>
		SS1 - Critical Thinking and Problem Solving Skill
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss2'); ?>
		SS2 - Communication Skills
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss3'); ?>
		SS3 - Teamwork Skills
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss4'); ?>
		SS4 - Ethics and Moral Professionalism
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss5'); ?>
		SS5 - Life-long Learning and Information Management
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss6'); ?>
		SS6 - Entrepreneurial Skills
	</li>
	<li>
		<?php echo $this->Form->checkbox('ss7'); ?>
		SS7 - Leadership Skills
	</li>
	</ul>

	</fieldset>
	</form>
</div>
<br />

