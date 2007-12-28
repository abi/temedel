

function showCommentBox(showId, hideId){

	$('#'+hideId).hide();
	$('#'+showId).show('fast');
	
	//make the addition of click actions better


}


function vote(type, content_type, content_id){

	$.ajax({
   type: "POST",
   url: "/votes/submit",
   data: "data[Vote][type]=" + type + "data[Vote][content_type]=" + content_type + "&data[Vote][content_id]=" + content_id,
   success: function(msg){
     alert( "Data Saved: " + msg );
   }
 });


}