(function($, window, document, undefined) {

const $win             = $(window);
const $doc             = $(document);
const $body            = $('body');
const $animatedElement = $('.animated');
const $map             = $('.map');

/**
 * Adds class to header on scroll
 * @return {[type]} [description]
 */
function headerScroll() {
	var winScrollTop = $win.scrollTop();
	var $header = $('.header');

	var isHeaderFixed = winScrollTop > 0;

	$header.toggleClass('sticky', isHeaderFixed);
}

/**
	 * Animates Elements with class 'animated'
 * @param  {[type]} $animatedElement [description]
 * @param  {[type]} winScrollTop     [description]
 * @param  {[type]} winHeight        [description]
 * @return {[type]}                  [description]
 */
function animatedElements($animatedElement, winScrollTop, winHeight) {
	var animatedInClass = 'animated-in';

	if ( $animatedElement.length ) {
		$animatedElement.each(function(){
			var $section = $(this);

			if ((winScrollTop + winHeight) * 0.98 > $section.offset().top) {
				$section.addClass(animatedInClass);
			} else {
				$section.removeClass(animatedInClass);
			}
		});
	}
}

function createVideos() {
	$('iframe[src*="player.vimeo"]').each(function(){
		var $btnContainer = $(this).closest('a');
		var player = new Vimeo.Player(this);

		player.on('ended', function() {
			$btnContainer.removeClass('active');
		});
		player.on('pause', function() {
			$btnContainer.removeClass('active');
		});

		$btnContainer.on('click', function(){
		  player.play();
		});
	});
}

$doc.ready( function() {
	/**
	 * Count up stats (viewportChecker and countUp)
	 */
	var options = {
	  useEasing: true,
	  useGrouping: true,
	  separator: ',',
	  decimal: '.',
	};

	$('[data-number]').viewportChecker({
		callbackFunction: function(elem, action){
			var counter = new CountUp(elem[0], 0, elem[0].dataset.number, 0, 2.5, options);
			counter.start();
		},
	});

	createVideos();

  $(document).on('change', '.list-regions input', function() {
	var regions = [];

	$('.list-regions input:checked').each(function() {
	  regions.push($(this).data('region'));
	});

	if (regions.length > 0) {
	  $.ajax({
		url: window.location.href,
		type: "GET",
		data: {
		  regions: regions,
		},
		success: function (response) {
		  var results = $(response).find('.list-camps').html();
		  $('.list-camps').html(results);
		},
		complete: function() {
		  $('.list-camps-results').removeClass('hidden');
		}
	  });
	} else {
	  $('.list-camps-results').addClass('hidden');
	}
  });

  $('.footer__bar .btn-close').on('click', function(e) {
	e.preventDefault();
	$.cookie('footer-bar', 'disabled', { expires: 1 });

	$('.footer__bar').fadeOut();
  });

  $("a[href^='#']:not(.video)").on('click', function(e){
	e.preventDefault();

	var section = $(this).attr('href');

	if ($(this).closest('.panel').length) {
		return;
	}

	var topOffset = $(section).offset();
	var sectionPadding = parseInt($(section).css('padding-top')) + parseInt($(section).css('margin-top'));
	var headerHeight = $('.header').outerHeight();

	$('html, body').animate({ scrollTop: topOffset.top - (headerHeight + sectionPadding + 20)}, 1000);
  });
});

/**
 * Responsive Tables
 * @return {[type]} [description]
 */
function tableTitles(){
	$('.table').each( function (){
		var $this = $(this);
		var $title = $this.find('th');
		var $col = $this.find('td');

		$col.each( function (){
			var $td = $(this);


			$td.attr('data-title', $title.eq($td.index()).text());
		});
	});
}

/**
 * Map Init
 */

function initMap(container) {
	var styles = [{
		featureType: 'all',
		elementType: 'all',
		stylers: [
			{ saturation: -100 }
		]}
	];

	var $map = document.getElementById(container);

	var lat = $map.getAttribute('data-lat');
	var lng = $map.getAttribute('data-lng');

	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 17,
		scrollwheel: false,
		draggable: false,
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'tehgrayz']
		}
	};

	var map = new google.maps.Map($map, mapOptions);

	var pin = options.theme_dir + '/dist/images/pin.png';

	var mapType = new google.maps.StyledMapType(styles, {
			name: 'Grayscale'
	});

	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(lat, lng),
		map: map,
		icon: pin,

	});

	map.mapTypes.set('tehgrayz', mapType);
	map.setMapTypeId('tehgrayz');

	var center = map.getCenter();

	google.maps.event.addDomListener(window, 'resize', function() {
		map.setCenter(center);
	});
}

tableTitles();

if ( $map.length ) {
	$map.each(function() {
		initMap($(this).attr('id'));
	});
}

$('.js-burger-btn').on('click', function(e) {
	e.preventDefault();

	$body.toggleClass('active');
});


$('.panel .panel-heading a').on('click', function(){
	$(this)
		.closest('.panel')
		.toggleClass('expanded')
		.siblings()
		.removeClass('expanded');
});

$('.js-video-popup').magnificPopup({
	type: 'iframe',
	mainClass: 'mfp-video'
});

 $win.on('scroll load resize', function() {
	var winHeight    = $win.height();

	var winScrollTop     = $win.scrollTop();

	animatedElements($animatedElement, winScrollTop, winHeight);
}).on('load scroll', function() {

	headerScroll();

}).on('load', function() {
	var $video = $('.video-content');

	if ( $video.length ) {
		$video.get(0).pause();
	}


	$('.js-video-inline').on('click', function(e) {
		e.preventDefault();

		$(this).addClass('active');
	});

	$('.slider-gallery .slider__slides').addClass('owl-carousel').owlCarousel({
		autoplay: true,
		mouseDrag: false,
		dots: true,
		loop: true,
		nav: true,
		items: 1,
		autoWidth: true,
		center: true,
		smartSpeed: 1000,
		responsive:{
			0:{
				autoWidth: false,
				center: false,
				items: 1,
			},
			768:{
				autoWidth: true,
				center: true
			}
		},
		autoplayHoverPause: true,
		responsiveRefreshRate: 1
	});
});

})(jQuery, window, document);
