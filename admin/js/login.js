//Regular button effects
$(function(){
	$('.regular_button').hover(function(){
		$(this).children().addClass('hovered');	
		$(this).children().removeClass('pressed');
	},function(){
		$(this).children().removeClass('hovered');
		$(this).children().removeClass('pressed');
	});
	
	$('.regular_button').bind('mousedown', function(){
		$(this).children().addClass('pressed');
	});
	
	$('.regular_button').bind('mouseup', function(){
		$(this).children().removeClass('pressed');
	});
});