$(function(){
	$("#menu-icon").on("click", function(){
		$(".sf-menu").slideToggle();
		$(this).toggleClass("active");
	});

	if ($('.flexslider').length > 0) {
		$('.flexslider').flexslider({
			animation: "fade",
			slideshow: true,
			slideshowSpeed: 7000,
			animationDuration: 600,
			prevText: "Previous",
			nextText: "Next",
			controlNav: true,
		});
	}

	// IPad/IPhone
	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
    ua = navigator.userAgent,

    gestureStart = function () {
        viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
    },

    scaleFix = function () {
      if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
        document.addEventListener("gesturestart", gestureStart, false);
      }
    };
	scaleFix();
	// Menu Android
	var userag = navigator.userAgent.toLowerCase();
	var isAndroid = userag.indexOf("android") > -1;
	if(isAndroid) {
		$('.sf-menu').responsiveMenu({autoArrows:true});
	}

	$('a').hover(
		function(){
			$(this).find("img").stop().animate({opacity:'0.5'},200)
		},
		function(){
			$(this).find("img").stop().animate({opacity:'1'},200)
		}
	)
});