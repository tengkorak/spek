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

		echo $this->Html->css('core');
		echo $this->Html->css('core-webkit');
		echo $this->Html->css('core-gecko');		
		echo $this->Html->css('menu');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<link rel="stylesheet" href="/css/colors.css.php" type="text/css" />	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js">
</script>
</head>
	
<body id="mc-login" class="transitions-enabled headers-fancy extendmenu-off menuwidth-small width-variable avatar-1 ltr option-com-login task- view-login">

<div id="mc-frame">
	<div id="mc-header">
		<div class="mc-wrapper">
			<div id="mc-status">
				<ul>
					<li class="action">
						<a href="/users/register/"> Register </a>
					</li>					
				</ul>					
			</div>	
		</div>
		<div id="mc-logo">
			<img src="/img/logo.png" alt="logo" class="mc-logo" width="40" height="40" />
			<h1>SPeK Administrator Login</h1>
		</div>
	</div>
			
	<div id="mc-body">
		<div class="mc-wrapper">
			<div id="mc-message">
				<div id="system-message-container">
					<?php echo $this->Session->flash(); ?>			
				</div>
			</div>			
			
				<?php echo $this->fetch('content'); ?>			
		</div>
	</div>	
			
	<div id="mc-footer">
		<div class="mc-wrapper">
			<p class="copyright">
				Copyright &copy; 2011 Unit Hal Ehwal Kurikulum, UiTM
			</p>
		</div>
	</div>
	
</div>


<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Js->writeBuffer();?>
</body>
</html>
