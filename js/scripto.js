$(document).ready(function(){
	$("#welcome_slogan").hide().fadeIn(500);
	$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);
	$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);$("#welcome_slogan").fadeOut(1500);$("#welcome_slogan").fadeIn(500);
	
	var total=0;
$("input[type=checkbox]").click( 
    function() { 
		
       if($(this).is(":checked")) {
	   $("#buyy").prepend("<tr ><center><p style='font-size:18px'><td align='center' class='prd' id='"+$(this).val()+"'><strong> &nbsp;&nbsp;"+$(this).parent().prev().children("#title").html()+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "+$(this).attr('class')+" DH </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img valign='right' src='images/accept-icon.png' /></td></p></center></tr>").hide().fadeIn(1000);
       total+=parseInt($(this).attr("class"));
	   $("#tot").html(total);
	   }

		else {
			
		$("td#"+$(this).val()).remove();
		total-=parseInt($(this).attr("class"));
		$("#tot").html(total);}
	   } 
);

$("input#valider").click(function()
	
	{
		$(this).attr("id","processing")
		var t=parseInt($(this).attr("class"));
	$.post("validator.php",{ s:t } ,function(data){
		if(data==1) $("input#processing").parent().html("<img valign='right' src='images/accept-icon.png' /> Validé").fadeIn(1000);
		else $("input#processing").parent().html("<img valign='right' src='images/cross.png' /> Connexion Impossible").fadeIn(1000);

	});
	}
	
	)
});