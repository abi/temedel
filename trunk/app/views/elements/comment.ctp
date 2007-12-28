<div style="padding-left:<?php echo $comment['indent'] * 100; ?>px" >

<table style="text-align: left; width: 823px; height: 104px;border:0" border="1" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="width: 86px;" align="undefined"valign="undefined">
      	 <?php echo $comment['votes'] ?> 
      <br> 
      	votes
      </td>
      <td style="width: 717px;" align="undefined" valign="undefined">      
      	<?php echo $comment['body'] ?> 
	  </td>
    </tr>
    <tr>
      <td style="width: 86px;" align="undefined" valign="undefined">
      	<?php echo $html->link('vote', 'vote/up/' . $comment['id']) ?>
      	<?php echo $html->link('unvote', 'vote/down/' . $comment['id']) ?>
      </td>
      <td style="width: 717px;" align="undefined" valign="undefined">
      	written by 
      	<?php //echo $comment['User']['nick'] . '@' . $comment['Comment']['time']  ?>
      </td>
    </tr>
  </tbody>
</table>




<?php echo $form->create('Comment', array('action' => 'submit', 'id' => 'replyform' . $comment['id'], 'style' => 'display:none')); ?>

   <?php
        echo $form->textarea('body', array('rows'=>'2'));
        echo $form->error('You can\'t submit an empty comment'); 
        echo $form->hidden('story_id', array('value' => $comment['story_id']));
        echo $form->hidden('parent_id', array('value' => $comment['id']));

    ?>
<?php echo $form->end('Submit'); ?>


<?php //TODO change to helper?>

<input type="button" value="Reply" id="<?php echo 'replyButton' . $comment['id']; ?>"  onclick="showCommentBox('<?php echo 'replyform' . $comment['id']; ?>',this.id)"/>

</div>