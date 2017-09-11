(function( $ ) {
	// base64/utf8 decode/decode for javascript compatible with PHP.
	var Base64 = {_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

	'use strict';

	var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");
	/* regex for email validation */
     var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

     // Scroll down specific section when page load
	var uri = window.location.toString();
	if (uri.indexOf("#") > 0) {
		var hashValue = location.hash;
		var clean_uri = uri.substring(0, uri.indexOf("#"));
		window.history.replaceState({}, document.title, clean_uri);
		setTimeout(function(){
			$('html,body').animate({
				scrollTop: $(hashValue).offset().top - $('#masthead').outerHeight(true)
			}, 1000);
		},500);
	}

	// scroll to specific section
	$('footer a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - $('#masthead').outerHeight(true)
				}, 1000);
				return false;
			}
		}
	});

     // homepage banner section
     if( $('body').hasClass('home') ) {
	     var banner_offset = $('.layers-block img.wall').offset(),
	     	header_height = $('#masthead').outerHeight(true),
	     	banner_img_v1 = $('.layers-block').find('img.v1'),
	     	banner_img_v2 = $('.layers-block').find('img.v2'),
	     	banner_img_v3 = $('.layers-block').find('img.v3');

	     $(window).on('load scroll resize', function() {
	     	var scroll = $(window).scrollTop();


	     	if( scroll >= header_height ) {
	     		// setTimeout(function() {
	     			// banner_img_v1.css({'visibility' : 'hidden', 'opacity' : '0'});
	     			// banner_img_v2.css({'visibility' : 'visibile', 'opacity' : '1'});
	     			banner_img_v1.fadeOut('slow');
	     			banner_img_v2.fadeIn('slow');
	     		// }, 3000);

	     		setTimeout(function() {
	     			/*banner_img_v1.css({'visibility' : 'hidden', 'opacity' : '0'});
	     			banner_img_v2.css({'visibility' : 'visibile', 'opacity' : '1'});
	     			banner_img_v3.css({'visibility' : 'visibile', 'opacity' : '1'});*/
	     			banner_img_v3.fadeIn('slow');
	     		}, 3000);
	     	}
	     });
	}

	// scroll to page section.
	$('a.tell-me-more').on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("#gray-block-header").offset().top - $('#masthead').outerHeight(true),
		}, 1000);
	})

	// footer signup click
	$('li.sign-up').on('click', function(e) {
		e.preventDefault();
		$('a[data-modal-id="#riyo-signup-form"]')[0].click();
	});

	// popup
	$('[data-modal-id]').on('click', function(e) {
		e.preventDefault();
		var $this = $(this),
			$target = $( $this.attr('data-modal-id') );
			console.log( $target );
		$("body").append( appendthis );
		$(".modal-overlay").fadeTo(500, 0.7);
		$('#riyo-popup').find(' > .popup-container').append( $target.contents() ).parent().attr( 'data-content-from', $this.attr('data-modal-id') ).fadeIn();
		$(window).resize();
		return false;
	});

	// popup close
	$('body').on('click', ".js-modal-close, .modal-overlay", function() {
		var $riyo_popup = $('#riyo-popup'),
			$content_from = $( $riyo_popup.attr('data-content-from') );

			$riyo_popup.fadeOut(800, function() {
				var $this = $(this);
				$(".modal-overlay").fadeOut(600, function() {
					if( typeof undefined !== typeof $content_from ) {
						$content_from.append( $riyo_popup.find(' > .popup-container').contents() );
					}
					$this.removeAttr('data-content-from').removeClass('video-container').find(' > .popup-container').html('');
					$(this).remove();
				});
			});
			/*setTimeout(function() {
				$(".modal-overlay").fadeOut(1000, function() {
					$(this).remove();
				});
			}, 100)*/
		/*$(".modal-box, .modal-overlay").fadeOut(500, function() {

		});*/

		return false;
	});

	$(window).resize(function() {
		$(".modal-box").css({
			top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
			left: ($(window).width() - $(".modal-box").outerWidth()) / 2
		});
	});



	// prevent default submit
	$('.popup-form').on('submit', function() {
		return false;
	});

	// user login form handler (not in use)
	$('form.login').on('submit', function() {
		var $form = $(this),
			username = $form.find('input#username'),
			password = $form.find('input#password');

		$form.find('span.msg').remove();

		if( '' == username.val() || '' == password.val() ) {
			$form.prepend('<span class="error msg">Username or Password empty.</span>');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: riyo.ajax,
			data: {
				'action': 'riyo_login',
				'username': username.val(),
				'password': Base64.encode(password.val()),
				'riyo-login-field': $form.find('input#riyo-login-field').val()
			}
		})
		.done( function(response) {
			if( response && true === response.status ) {
				window.location.href = window.location.href;
			}
			else if( response && ! response.status ) {
				$form.prepend('<span class="error msg">' + response.message + '</span>');
				return false;
			}
			else {
				$form.prepend('<span class="error msg">Login failed!</span>');
				return false;
			}
		})
		.fail(function(jqXHR, textStatus) {
			$form.prepend('<span class="error msg">' + textStatus + '</span>');
			return false;
		});

		return false;
	});

		// load more posts
	$('a.load-more').on('click', function(e) {
		e.preventDefault();
		var $this = $(this),
			paged = $this.attr('data-paged'),
			author = $this.attr('data-author'),
			category = $this.attr('data-category');

		$this.addClass('post-loading');

		// var load_args = JSON.parse( args );

		// if( typeof undefined !== typeof load_args ) {
			$.ajax({
				type: 'POST',
				url: riyo.ajax,
				data: {
					action: 'riyo_load_more',
					paged: paged,
					author: author,
					category: category,
				}
			})
			.done(function(response) {
				if( response ) {
					$( "#main article" ).last().after( response.output );
					if( response.hide ) {
						$this.hide();
					}
					else {
						$this.attr('data-paged', parseInt(paged) + 1 );
					}
				}
				$this.removeClass('post-loading');
			})
			.fail(function() {
				$this.removeClass('post-loading');
			});
		// }
	});

	// move contact form before submit button
	if( $('.wpcf7-response-output').length ) {
		$('.wpcf7-response-output').each(function() {
			var $this = $(this),
				$form = $this.parents('form');

				$this.detach().insertBefore( $form.find('input[type="submit"]') );
		});
	}




	

	// custom tab
	$('.tabs li').on('click', function(e) {
		e.preventDefault();
		var $this = $(this),
		$parent = $this.parent(),
		$target = $( $this.find('a').attr('href') );

		if( $target.length ) {
			$target.parent().find('.tab-active').removeClass('tab-active').fadeOut(100, function() {
				$parent.parent().find('.active').removeClass('active');
				$this.addClass('active');
				$target.addClass('tab-active').fadeIn(100);
			});
		}

	});

<<<<<<< HEAD
	//  
	
=======
	//
	$('input.wpcf7-submit').on('click', function() {
		var $this = $(this),
			$form = $this.parents('form');
		var check_error = setInterval(function() {
			$form.find('span input, span select').each(function() {
				var $input = $(this);
				if( $input.hasClass('wpcf7-not-valid') ) {
					$input.parents('label').addClass('field-error');
				}
				else {
					$input.parents('label').removeClass('field-error');
				}
			});
		});
		setTimeout(function() {
			clearInterval(check_error);
		}, 1000);
	});

>>>>>>> 5550d2b2fdad5b124ae763a84900caa77d6158a2

	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {
		var $markers = $el.find('.marker');
		var args = {
			zoom		: 20,
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			draggable: false,
			zoomControl: false,
			scrollwheel: false,
			disableDoubleClickZoom: false,
			streetViewControl: false,
			styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

		};

		var map = new google.maps.Map( $el[0], args);



		map.markers = [];

		$markers.each(function(){
	    		add_marker( $(this), map );
		});

		center_map( map );

		return map;
	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		var icon = {
			url: riyo.url + '/wp-content/themes/riyo/images/map-marker.svg',
		}

		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon : icon,
		});

		map.markers.push( marker );

		if( $marker.html() )
		{
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {
		var bounds = new google.maps.LatLngBounds();
		$.each( map.markers, function( i, marker ){
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );

			/*var cityCircle = new google.maps.Circle({
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 1,
				fillColor: '#FF0000',
				fillOpacity: 0.05,
				map: map,
				center: {lat: marker.position.lat(), lng: marker.position.lng()},
				radius: 80
			});*/

			/*var cityCircle = new google.maps.Circle({
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 1,
				fillColor: '#FF0000',
				fillOpacity: 1,
				map: map,
				center: {lat: marker.position.lat(), lng: marker.position.lng()},
				radius: 5
			});*/

			// marker.setMap(null);

		});

		if( map.markers.length == 1 )
		{
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );

		    google.maps.event.addDomListener(window, 'resize', function() {
		    	map.setCenter(bounds.getCenter());
		    });
		}
		else
		{
			map.fitBounds( bounds );
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	$(document).ready(function(){
		var map = '';
		$('.riyo-map').each(function(){
			map = new_map( $(this) );
		});

		// setTimeout(function() {
		// 	$('.tabs li').first().trigger('click');
		// }, 2000);

		$(window).resize(function() {
			if( typeof undefined !== typeof google ) {
				google.maps.event.trigger(map, "resize");
			}
		});
	});

})(jQuery);
