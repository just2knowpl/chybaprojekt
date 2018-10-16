$(document).ready(function() {
	if ($(window).width() > 960) {
	$('#mySidenav').css('width', '250px');
	$('main').css('marginLeft', '250px');
	
	$('.open').click(function() {
		$('#mySidenav').css('width', '250px');
		$('main').css('marginLeft', '250px');
	});
	
	$('.closebtn').click(function() {
		$('#mySidenav').css('width', '0');
		$('main').css('marginLeft', '0');
	});
	}else {
		$('.open').click(function() {
			$('#mySidenav').slideToggle('slow');
			$('main').css('marginLeft', '0');
		});
	}
		
 
});