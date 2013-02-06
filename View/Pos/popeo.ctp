<!--[if IE]>
   <style>
      .rotate_text
      {
         writing-mode: tb-rl;
         filter: flipH() flipV();
      }
   </style>
<![endif]-->
<!--[if !IE]><!-->
   <style>
      .rotate_text
      {
         -moz-transform:rotate(-90deg); 
         -moz-transform-origin: top left;
         -webkit-transform: rotate(-90deg);
         -webkit-transform-origin: top left;
         -o-transform: rotate(-90deg);
         -o-transform-origin:  top left;
          position:relative;
         top:20px;
      }
   </style>
<!--<![endif]-->

   <style>  
      table
      {
         table-layout: fixed;
         width: 69px; /*Table width must be set or it wont resize the cells*/
      }
      th, td 
      {
          width: 23px;
      }
      .rotated_cell
      {
         height:300px;
         vertical-align:bottom
      }
   </style>

<div id="mc-title">
	<h1>PO-PEO Matrix</h1>												
	<div class="mc-toolbar" id="toolbar">
		<ul>
			<li class="button special" id="toolbar-back">
			<?php echo $this->Html->link(__('Back'), array(
													'controller' => 'programs', 
													'action' => 'view', 
													$this->passedArgs[0])); 
			?>
			</li>

			<li class="divider">
			</li>
		</ul>
	</div>						

	<div class="mc-clr"></div>
</div>

<?php
$size = count($peos);
?>

<div id="mc-component">
	<div class="mc-clr"></div>

<table class="adminlist">
	<tr>
		<td colspan='1' rowspan='2' width='50%'></td>
		<td colspan='<?php echo $size ?>'> PEO Description </td>
	</tr>
	<tr>
		<?php 
			foreach($peos as $peo) {
				echo '<td class="rotated_cell"><div class="rotate_text">' . $peo . '</div></td>';
			}
		?>
	</tr>
		<?php 
			foreach($pos as $po) {
				echo  '<tr><td>' . $po['Po']['description'] . '</td>';

				foreach($peos as $key=>$value) {
					echo '<td>';
					foreach($po['Peo'] as $popeo){
						if($popeo['id'] == $key) {
							echo 'X';
						}
					}
					echo '</td>';
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