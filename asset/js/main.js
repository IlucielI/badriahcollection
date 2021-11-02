// first slider

$(".slider-one").not(".slick-intialized").slick({
	autoplay: true,
	autoplaySpeed: 3000,
	dots: true,
	prevArrow: ".site-slider .slider-btn .prev",
	nextArrow: ".site-slider .slider-btn .next",
});

// second slider
$(".slider-two").not(".slick-intialized").slick({
	autoplay: true,
	autoplaySpeed: 2500,
	prevArrow: ".site-slider-two .prev",
	nextArrow: ".site-slider-two .next",
	slidesToShow: 5,
	slidesToScroll: 1,
});

var lastScrollTop = 0;
var header = document.getElementsByTagName("header");
window.addEventListener("scroll", function () {
	var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	if (scrollTop > lastScrollTop) {
		header[0].style.top = "-280px";
	} else {
		header[0].style.top = "0";
		header[0].style.position = "sticky";
	}
	lastScrollTop = scrollTop;
});
