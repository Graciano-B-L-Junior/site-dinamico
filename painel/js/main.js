$(function(){
	var open = true;

	var windowSize = $(window)[0].innerWidth;
	var targetMenu = (windowSize <=400) ? 200 : 300;

	if(windowSize <= 768){
		open = false;
		$('.menu').css('width','0').css('padding','0');
	}

	$('.menu-btn').click(function(){
		if(open == true){
			$('.menu').animate({'width':'0','padding':'0'},function(){
				open = false;
			})
			$('.content,header').css('width','100%')
			$('.content,header').animate({'left':'0'},function(){
				open = false;
			})
		}else{
			$('.menu').css('display','block');
			$('.menu').animate({'width':targetMenu+'px'},function(){
				open = true;
			})
			$('.content,header').css('width','80%')
			$('.content,header').animate({'left':targetMenu+'px'},function(){
				open = true;
			})
		}
	})

	$('.btn-delete').click(function(){
		var txt;
		var r = confirm("Deseja exluir o depoimento");
		if(r == true){
			return true;
		}else{
			return false;
		}
	})
})