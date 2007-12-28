 <table style="text-align: left; width: 754px; height: 130px;" border="0" cellpadding="0" cellspacing="2">
	  <tbody>
		<tr>
		  <td style="width: 90px; text-align: center;">
			 <?php echo $html->link($story['Story']['votes'], "view/" . $story['Story']['id']) ?>
			 <br> votes
		 </td>
		  <td style="width: 644px;">
			<?php echo $html->link($story['Story']['title'], $story['Story']['link']) ?>
			<br/>
			<?php echo $story['Story']['description'] ?>
		  </td>
	   </tr>
		<tr>
		  <td style="width: 90px;">
		  	<?php 
				echo $ajax->link('up', '/votes/submit/story/' . $story['Story']['id'] . '/up');
			?>&nbsp;
		  	<?php 
				echo $ajax->link('down', '/votes/submit/story/' . $story['Story']['id'] . '/down');
			?>	  
		  	</td>
		 <td style="width: 644px;"> 
		 	<?php echo $html->link(sizeof($story['Comment']) . ' comments', "view/" . $story['Story']['id']) ?> | &nbsp;
		 <?php echo $story['Story']['type'] ?> &nbsp; |
		 &nbsp;<?php echo $story['Category']['category'] ?>
		 <br/> 
		 submitted by <?php echo $story['User']['nick'] ?>
		 <?php echo $time->timeAgoInWords($story['Story']['created']) ?>| 
		 made popular <?php echo $time->timeAgoInWords($story['Story']['popular']) ?></td>
		</tr>
	  </tbody>
</table>