var numberOfImages = $('.img img').length,
		numberOfLoaded = 0,
		step = 100 / numberOfImages;
	
	$('.img img').each( function (i, item) {
		$(item).load( function () {
			numberOfLoaded++;
			progressBar(step * numberOfLoaded, $('#progressBar'));
		});
	});