var tip;
$(document).ready(function(){
    $(".tip_trigger").click(function(){
        return false;
    });
    tooltip();
});
function tooltip()
{$(".tip_trigger").hover(function(){
	tip = $(this).find('.tip');
	if(tip!=null)tip.show(); //Show tooltip
	}, function() {
	    tip = $(this).find('.tip');
		tip.hide(); //Hide tooltip		  
	}).mousemove(function(e) {
	    tip = $(this).find('.tip');
		var mousex = e.pageX + 5 ; //Get X coodrinates
		var mousey = e.pageY + 20; //Get Y coordinates
		var tipWidth = tip.width(); //Find width of tooltip
		var tipHeight = tip.height(); //Find height of tooltip	
        //alert($(window).scrollTop()+"---"+screen.height+"--"+mousey);
        //alert($(window).height()+"--"+mousey+"---"+tipHeight+"--"+posi.top);	
		//Distance of element from the right edge of viewport
		var tipVisX = $(window).width() - (mousex + tipWidth);
		//Distance of element from the bottom of viewport
		var tipVisY = mousey - $(window).scrollTop();		  
		if ( tipVisX < 5 ) { //If tooltip exceeds the X coordinate of viewport
			mousex = e.pageX - tipWidth - 5 ;
		} if ( tipVisY > tipHeight) { //If tooltip exceeds the Y coordinate of viewport
			mousey = e.pageY - tipHeight ;		} 
		tip.css({  top: mousey, left: mousex });
});}