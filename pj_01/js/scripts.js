$(function(){
	$('.mobile').click(function(){


		var listaMenu = $('.mobile ul');

		if(listaMenu.is(':hidden') == true){
			listaMenu.slideToggle();
			var icone = $('.botao-menu-mobile i');
			icone.removeClass('fas fa-bars');
			icone.addClass('fas fa-times');
		}else{
			var icone = $('.botao-menu-mobile i');
			icone.removeClass('fas fa-times');
			icone.addClass('fas fa-bars');
			listaMenu.slideToggle();
		}
	});
	if($('target').length > 0){
		var elemento ='#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({'scrollTop':divScroll},500);
	}
})