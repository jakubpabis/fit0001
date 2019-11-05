'use strict';

function lazyImages()
{

	$('.lazyset').each(function() {
		if(!$(this).hasClass('loaded')) {
			$(this).attr('srcset', $(this).data('srcset')).removeAttr('data-srcset').addClass('loaded');
		}
	});
	$('.lazy').each(function() {
		if(!$(this).hasClass('loaded')) {
			$(this).attr('src', $(this).data('src')).removeAttr('data-src').addClass('loaded');
		}	
	});
	
	$(window).on('scroll', function() {
	
		$('.lazyset').each(function() {
			if($(this).visible( true ) && !$(this).hasClass('loaded')) {
				$(this).attr('srcset', $(this).data('srcset')).removeAttr('data-srcset').addClass('loaded');
			}
		});
		$('.lazy').each(function() {
			if($(this).visible( true ) && !$(this).hasClass('loaded')) {
				$(this).attr('src', $(this).data('src')).removeAttr('data-src').addClass('loaded');
			}	
		});

	});

}

$(document).ready(function() {

	var options = {
		prefetch: true,
		cacheLength: 10,
		onStart: {
			duration: 500, // Duration of our animation
			render: function ($container) {
				// Add your CSS animation reversing class
				$container.addClass('is-exiting');
				// Restart your animation
				smoothState.restartCSSAnimations();
			}
		},
		onReady: {
			duration: 500,
			render: function ($container, $newContent) {
				// Remove your CSS animation reversing class
				$container.removeClass('is-exiting');
				// Inject the new content
				$container.html($newContent);
			}
		},
		onAfter: function () {
			lazyImages();
		}
	},
	smoothState = $('#wrapper').smoothState(options).data('smoothState');

});

$(window).on('load', function() {

	lazyImages();

});