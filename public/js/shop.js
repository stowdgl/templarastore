
$(document).ready(function() {
	$(".dws-progress-bar").circularProgress({
		color: "#25ffe4",
		line_width: 17,
		height: "350px",
		width: "350px",
		percent: 0,
		// counter_clockwise: true,
		starting_position: 25
	}).circularProgress('animate', 100, 2000);
    $("body").fadeIn(400);

$('#myCarousel').carousel()
$('#newProductCar').carousel()

/* Home page item price animation */
$('.thumbnail').mouseenter(function() {
   $(this).children('.zoomTool').fadeIn();
});

$('.thumbnail').mouseleave(function() {
	$(this).children('.zoomTool').fadeOut();
});

// Show/Hide Sticky "Go to top" button
	$(window).scroll(function(){
		if($(this).scrollTop()>200){
			$(".gotop").fadeIn(200);
		}
		else{
			$(".gotop").fadeOut(200);
		}
	});
// Scroll Page to Top when clicked on "go to top" button
	$(".gotop").click(function(event){
		event.preventDefault();

		$.scrollTo('#gototop', 1500, {
        	easing: 'easeOutCubic'
        });
	});

});
$(window).on('load', function () {
	var $preloader = $('#preloader');
	$preloader.delay(1800).fadeOut('slow');
});