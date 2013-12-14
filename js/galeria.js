$(function() {

	/* First demo */
	$('#galeria_thumbs').desoSlide({
		main: {
			container: '#galeria_main_image',
			cssClass: 'img-responsive imagen img-thumbnail'
		},
		overlay: 'none',
		controls: {
			enable: false,
			keys: false
		}
	});

});