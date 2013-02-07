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
						<span class="logout"><a href="/uhek/users/logout"> Logout </a></span>
					</li>
				</ul>					
			</div>
					
			<div id="mc-logo">
				<img src="/uhek/img/logo.png" alt="logo" class="mc-logo" width="40" height="40" />						
				<h1>SPeK Administrator</h1>
			</div>

			<div id="mc-nav">
					<ul id="mctrl-menu" class="menutop level1">
					<li class="li-dashboard dashboard root">
							<a class="dashboard item" href="/uhek/programs/"> Home </a>
					</li>
					<?php
						if ($this->Session->read('Auth.User')){
							if($this->Session->read('Auth.User.group_id') == 1)
							{
					?>
					<li class="li-users parent root">
						<span class=" daddy item"><span>Users</span></span>
						<ul class="level2 parent-users">
							<li class="li-user-manager class:user parent">
								<a class="class:user daddy item" href="/uhek/users/"> Manage Users
								</a>
									<ul class="level3 parent-user-manager">
									<li class="li-add-new-user class:newarticle"><a class="class:newarticle item" href="/uhek/users/add"> Add New User</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="li-users parent root">
						<span class=" daddy item"><span>Programs</span></span>
						<ul class="level2 parent-users">
							<li class="li-user-manager class:user parent">
								<a class="class:user daddy item" href="/uhek/programs/"> Manage Programs
								</a>
									<ul class="level3 parent-user-manager">
									<li class="li-add-new-user class:newarticle"><a class="class:newarticle item" href="/uhek/programs/add"> Add New Program </a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="li-users parent root">
						<span class=" daddy item"><span> Courses </span></span>
						<ul class="level2 parent-users">
							<li class="li-user-manager class:user parent">
								<a class="class:user daddy item" href="/uhek/courses/"> Manage Courses 
								</a>
									<ul class="level3 parent-user-manager">
									<li class="li-add-new-user class:newarticle"><a class="class:newarticle item" href="/uhek/courses/add"> Add New Course </a>
									</li>
								</ul>
							</li>
						</ul>
					</li>										
					<?php
						}
					}
					?>
				</ul>
			</div>

			<div id="mc-userinfo">
				<div class="mc-userinfo2">
					<div class="gravatar">
						<img src="/uhek/img/avatar.png" alt="gravatar" />
					</div>
					<div class="userinfo active">
						<b>
						<?php
							if ($this->Session->read('Auth.User')){
								echo $this->Session->read('Auth.User.fullname');
							}
						?>
						</b>
						<!--
							<span class="mc-button">
							<a href="#">edit</a>
							</span>
						-->
						<br />
						<!-- 
							<a href="index.php?option=com_messages">(<span class="no-unread-messages">0</span>) Messages</a>
						-->
						<br />
						last visit: 
						<?php
							if ($this->Session->read('Auth.User')){
								echo $this->Session->read('Auth.User.lastlogin');
							}
							else {
								echo "Never";
							}
						?>
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
			<?php echo $this->Session->flash(); ?>			
		</div>
		
		<!--
		<div id="mc-submenu">
			<ul id="submenu">
			<li>
				<span class="logout">
					<a class="active" href="index.php?option=com_nutrient&amp;view=foods">Foods</a>
				</span>
			</li>
			<li>
				<a class="active" href="index.php?option=com_nutrient&amp;view=recents">Recents</a>
			</li>
			<li>
				<a class="active" href="index.php?option=com_nutrient&amp;view=submits">Submitted</a>
			</li>
			</ul>
		</div>
		-->
				<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</div>

<div id="footer">
</div>


<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Js->writeBuffer();?>
</body>
</html>
