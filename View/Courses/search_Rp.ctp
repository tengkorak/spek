<div id="mc-title">
	<h1> Add Resource Person </h1>																	

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
<div class="mc-clr"></div>
<fieldset class="adminform">


<?php echo $this->Form->create('User');?>
<ul class="adminformlist">	
<li>
<?php echo $this->Form->input('username', array('div' => false, 'empty', 'label' => false, 'placeholder' => 'Enter Staff ID/Fullname'));?>
</li>
<li>
<?php echo $this->Js->submit('Search', array(
    'before'=>$this->Js->get('#checking')->effect('fadeIn'),
    'success'=>$this->Js->get('#checking')->effect('fadeOut'),
    'update'=>'#choose_options')
    )
;?> 
</li>
</ul>
<?php echo $this->Form->end();?>
</fieldset>

<div id="choose_options"></div>
</div>