$(function(){

	$(window).scroll(function(){
		if($(this).scrollTop()>0){
			$('.lm-header,lm-footer').each(function(){
				$(this).addClass("lm-header_fixo")
			}
		)}else{
			$('.lm-header').each(function(){
				$(this).removeClass("lm-header_fixo")
			})
		};
	});
	$(window).scroll();

	// Select all links with hashes
	$('a[href*="#"].scroll').not('[href="#"]').not('[href="#0"]').click(function(event) {
		// On-page links
		if ( location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname ) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000, function() {
					// Callback after animation
					// Must change focus!
					var $target = $(target);
					$target.focus();
					if ($target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					};
				});
			}
		}
	});


	if(window.location.href.indexOf("#autoscroll-in-") > -1){
		hrefScroll = window.location.href;
		hrefScroll = hrefScroll.replace("#autoscroll-in-", "#"); 
		hrefScroll = hrefScroll.substr(hrefScroll.indexOf("#"), hrefScroll.length); 
		if (document.querySelectorAll("a[href='"+hrefScroll+"']").length) {
			document.querySelectorAll("a[href='"+hrefScroll+"']")[0].click();
		}
	}

	$(document).ready(function() {
		function iframeSize(i){
			var mapElement = $(".wq-videos video");
			var mapElementWidth = mapElement.width();

			mapElement.css("height", mapElementWidth * 0.5639 );
		}
		iframeSize();
		$( window ).resize(function() {
			iframeSize();
		});
	});

});