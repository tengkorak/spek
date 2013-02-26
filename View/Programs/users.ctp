<div id="choose_options">

<?php
if(!empty($users) ) {

foreach ($users as $user) :
	echo $user['User']['fullname'] . "&nbsp;&nbsp;&nbsp;";
	echo $this->Html->link(__(' Assigned as KPP/PP '), array('controller' => 'programs', 'action' => 'addCoor', $user['User']['id'],$this->passedArgs[0]));
	echo "<br />";
endforeach;

}
else {
	echo "No user found";
}