<div id="mc-title">
	<h1>PO-LOKI Matrix</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button special" id="toolbar-back">			
			<?php echo $this->Html->link(__('Back'), array(
															'controller' => 'programs', 
															'action' => 'view', 
															$this->passedArgs[0])); ?>
			</li>
			<li class="divider">
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<div id="mc-component">
	<div class="mc-clr"></div>

<table class="adminlist">
	<tr>
		<td colspan='1' rowspan='2' width='50%'></td>
		<td colspan='9'> MOHE Learning Outcome (LO) </td>
		<td colspan='7'> MOHE Soft Skill (KI) </td>
	</tr>
	<tr>
		<td><div class="v"> Knowledge in Specific Area - Content </div></td>
		<td><div class="v"> Practical Skills </div></td>
		<td><div class="v"> Thinking and Scientific Skills </div></td>
		<td><div class="v"> Communication Skills </div></td>
		<td><div class="v"> Social Skills, Teamwork and Responsibilities </div></td>
		<td><div class="v"> Values, Ethics, Moral and Professionalism </div></td>
		<td><div class="v"> Information Management and Lifelong Learning </div></td>
		<td><div class="v"> Management and Entrepreneurship </div></td>
		<td><div class="v"> Leadership Skills </div></td>
		<td><div class="v"> Critical Thinking and Problem Solving Skills </div></td>
		<td><div class="v"> Communication Skills </div></td>
		<td><div class="v"> Teamwork Skills </div></td>
		<td><div class="v"> Ethics and Moral Professionalism </div></td>
		<td><div class="v"> Lifelong Learning and Information Management </div></td>
		<td><div class="v"> Entreprenurial Skills </div></td>
		<td><div class="v"> Leadership Skills </div></td>
	</tr>
	<tr>
		<td> PO Description </td>
		
		<?php
		for($i=1; $i<=9; $i++) {
			echo '<td> LO' . $i . ' </td>'; 
		}

		for($i=1; $i<=7; $i++) {
			echo '<td> SS' . $i . ' </td>'; 
		}
		?>

	</tr>

		<?php 
			foreach($pos as $po) {
				echo  '<tr><td>' . $po['Po']['description'] . '</td>';

				if($po['Po']['lo1'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo2'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo3'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo4'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo5'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo6'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo7'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo8'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['lo9'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss1'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss2'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss3'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss4'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}
				if($po['Po']['ss5'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss6'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				if($po['Po']['ss7'] == true) {
					echo '<td> X </td>';
					}
				else {
					echo '<td> &nbsp; </td>';
				}

				echo '</tr>';
			}
		?>
</table>
</div>
<br />
<br />
<script>
$(document).ready(function(){
    $('.v').each(function(i,e){
        var $e = $(e),
            t = $e.text(),
            c = document.createElement('canvas'),
            ctx = c.getContext('2d');
        
        c.width = 400;
        c.height = 18;
        
        ctx.fillText(t,0,18);
        var sizes = ctx.measureText(t);
        c.height = sizes.width;
        c.width = 18;
        ctx.save();
        ctx.rotate(Math.PI/2);
        ctx.fillText(t,0,0);
        ctx.restore();
        $e.replaceWith($(c));      
    });
});
</script>