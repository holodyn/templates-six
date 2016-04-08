
(function(){

	/* Scroll Toggle
	jQuery(document).ready(function(){
		jQuery('.home-left-cta.testimonials ul').each(function(){
			var ul = this;
			jQuery(ul).scrollTop(0);
			var tscroller = function(){
				var st = jQuery(ul).scrollTop();
				console.log( jQuery(ul).height(), jQuery(ul).innerHeight(), jQuery(ul).outerHeight(), jQuery(ul).scrollTop() );
				jQuery(ul).animate({
					easing: 'swing',
					scrollTop: (st ? 0 : (jQuery(ul).height() - jQuery(ul).scrollTop()))
				}, 2000);
				setTimeout(function(){ tscroller(); }, 5000);
			};
			setTimeout(function(){ tscroller(); }, 5000);
		});
	});
	*/

	jQuery(document).ready(function(){
		var running = false, active;
		jQuery('.comments-block > div')
			.mouseover(function(){
				jQuery(this).siblings().attr('class', 'col-sm-12 col-md-4');
				jQuery(this).attr('class', 'col-sm-12 col-md-8');
			})
			.mouseout(function(){
				jQuery(this).siblings().attr('class', 'col-sm-12 col-md-6');
				jQuery(this).attr('class', 'col-sm-12 col-md-6');
			});
	});

	/* Fade Replace */
	jQuery(document).ready(function(){
		jQuery('.home-left-cta.testimonials ul').each(function(){
			var ul = jQuery(this);
			jQuery(ul).scrollTop(0);
			var tscroller = function(){
				var li = jQuery(ul).find('li').first();
				var liHeight = li.outerHeight() + 30;
				ul.animate({
						easing: 'swing',
						scrollTop: liHeight
					}, 1000);
				li.fadeOut(1000, function(){
					jQuery(this)
						.insertAfter( jQuery(ul).find('li').last() )
						.show();
					jQuery(ul)
						.scrollTop(0);
					});
				setTimeout(function(){ tscroller(); }, 5000);
			};
			setTimeout(function(){ tscroller(); }, 5000);
		});
	});

})();
