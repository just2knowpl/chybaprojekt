$(document).ready(function() {
	if ($(window).width() > 960) {
	$('#mySidenav').css('width', '250px');
	$('main').css('marginLeft', '250px');
	
	$('.open').click(function() {
		$('#mySidenav').css('width', '250px');
		$('main').css('marginLeft', '250px');
		$('#mySidenav a').fadeIn(900);
		$('.ranga h5').fadeIn(900);
	});
	
	$('.closebtn').click(function() {
		$('#mySidenav').css('width', '0');
		$('main').css('marginLeft', '0');
		$('#mySidenav a').fadeOut(100);
		$('.ranga h5').fadeOut(100);
	});
	}else {
		$('.open').click(function() {
			$('#mySidenav').slideToggle('slow');
			$('main').css('marginLeft', '0');
		});
	}
		
 
});