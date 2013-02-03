<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('core');
		echo $this->Html->css('core-webkit');
		echo $this->Html->css('menu');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<link rel="stylesheet" href="/uhek/css/colors.css.php" type="text/css" />	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js">
</script>
</head>
<body id="mc-standard" class="transitions-enabled headers-fancy extendmenu-off menuwidth-small width-variable avatar-1 ltr option-com-nutrient task- view-foods">
<div id="mc-frame">
	<div id="mc-header">
		<div class="mc-wrapper">
			<div id="mc-status">
				<ul class="active">
					<li class="action">
						<span class="logout"><a href="/administrator/index.php?option=com_login&amp;task=logout&amp;7768a109d7c0ca308203106236ab9aed=1">Logout</a></span>
					</li>
					<li>
						<span class="preview"><a href="http://localhost:8888/" target="_blank">View Site</a></span>
					</li>
					<li>
						<span><a>System Tools</a></span></li><li class="dropdown quickedit"><select id="editor_selection"><option value="jce" selected="selected">Editor - Jce</option><option value="codemirror">Editor - Codemirror</option><option value="none">Editor - None</option><option value="tinymce">Editor - Tinymce</option></select><div id="editor_spinner" class="spinner"></div>
					</li>
				</ul>					
			</div>
					
			<div id="mc-logo">
				<img src="images/missioncontrol-logo.png?1340252512" alt="logo" class="mc-logo" width="40" height="40" />						
				<h1>FCD Administrator</h1>
			</div>
					
			<div id="mc-nav">
				<ul id="mctrl-menu" class="menutop level1">
					<li class="li-dashboard dashboard root">
						<a class="dashboard item" href="index.php">Dashboard</a></li>
					<li class="li-extend extendmenu parent root">
						<span class="extendmenu daddy item"><span>Extend</span>
						</span>
						<ul class="level2 parent-extend">
							<li class="li- separator separator">
							<span></span>
							</li>
							<li class="li-nutrient class:component"><a class="class:component item" href="index.php?option=com_nutrient">Nutrient</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<div id="mc-userinfo">
				<div class="mc-userinfo2">
					<div class="gravatar">
						<img src="http://www.gravatar.com/avatar/a95e5c1dd17437e98470ea7f595a5ec6?s=46&d=mm&r=g" alt="gravatar" />
					</div>
					<div class="userinfo active"><b>Aisyah Binti Abu Bakar</b>
						<span class="mc-button">
							<a href="#">edit</a>
						</span><br />
						<a href="index.php?option=com_messages">(<span class="no-unread-messages">0</span>) Messages</a><br />last visit: 2012-06-21 03:42:14
					</div>
					<div class="session_expire">
						<div class="session_progress"></div>
					</div>						
				</div>
			</div>
					
			<div class="mc-clr"></div>
		
		</div>
	</div>
	
	<div id="mc-body">
		<div class="mc-wrapper">
					
		<div id="system-message-container">
		</div>
	
		<div id="mc-title">
			<h1>Manage Foods</h1>												
			<div class="mc-toolbar" id="toolbar">
				<ul>
					<li class="button special" id="toolbar-new">
					<a href="#" onclick="javascript:Joomla.submitbutton('food.add')" class="toolbar">
					<span class="icon-32-new">
					</span>
					New
					</a>
					</li>

					<li class="divider">
					</li>

					<li class="button" id="toolbar-edit">
					<a href="#" onclick="javascript:if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ Joomla.submitbutton('food.edit')}" class="toolbar">
					<span class="icon-32-edit">
					</span>
					Edit
					</a>
					</li>

				</ul>
			</div>						

			<div class="mc-clr"></div>
		</div>
		
		<div id="mc-submenu">
			<ul id="submenu">
			<li>
				<a class="active" href="index.php?option=com_nutrient&amp;view=foods">Foods</a>
			</li>
			<li>
				<a class="active" href="index.php?option=com_nutrient&amp;view=recents">Recents</a>
			</li>
			<li>
				<a class="active" href="index.php?option=com_nutrient&amp;view=submits">Submitted</a>
			</li>
			</ul>
		</div>

		<div id="mc-components">
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>			
			</div>
		</div>

		</div>
	</div>
</div>

		<div id="mc-components">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>			
		</div>

<div id="footer">
</div>


<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Js->writeBuffer();?>
</body>
</html>
