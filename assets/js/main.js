(function ($, root, undefined) {
	$(function () {
		
		'use strict';
		
		$("#site-menu").click(function(){
			$("#site-menu").toggleClass("is-visible");
		});
		
		$(document).ready(function() {
			var owl = $('.owl-carousel');
			owl.owlCarousel({
				loop: true,
				margin: 15,
				responsiveClass:true,
				responsive: {
					0:{
						items: 2,
					},
					
					480:{
						items: 4,
					},
					
					768:{
						items: 5,
					},
					
					960:{
						items: 6,
					},
					
					1200:{
						items:6,
					},
				}
			});
			
			$('.carousel-prev').click(function() {
				owl.trigger( 'prev.owl.carousel' );
			});
			
			$('.carousel-next').click(function() {
				owl.trigger( 'next.owl.carousel' );
			});
		});
		
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 200) {
				$('.scrollup').fadeIn(200);
			} else {
				$('.scrollup').fadeOut(200);
			}
		});
		
		$('.scrollup').click(function() {
			$('body,html').animate({
				scrollTop : 0
			}, 500);
		});
	});
})(jQuery, this);