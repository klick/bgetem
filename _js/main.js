$(document).ready(function(){

	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) 
		{
			$('div.back-to-top-arrow').fadeIn();
		} 
		else 
		{
			$('div.back-to-top-arrow').fadeOut();
		}
	});
		
	$('.scroll-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},400);
		return false;
	});

	$('.collapse').on('hidden.bs.collapse', function() {
		alert('hidden'); 
	});


	$('.toggle-search-form').on('click', function(){
		$('form.search-form--header').toggleClass("hidden");
		$('div.social-links').toggleClass("hidden");
		$('nav.main-nav--header').toggleClass("hidden");
	})

	$('p.toggle-nav').on('click', function(){
		$('nav.main-nav').toggleClass("no-mobile-visibility");
		$('div.social-links').toggleClass("no-mobile-visibility");
		$('form.search-form--header').toggleClass("hidden");
		$(this).find('span').toggleClass("hidden");
		$('body').toggleClass('freeze');
	})

});

