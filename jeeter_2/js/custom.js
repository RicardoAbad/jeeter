(function($) {

	//descomentar si modulo pace esta activado (preloader)
	/*Pace.on("done", function(){
		$(".pace-background").slideUp(1000, function () {
			$(".pace-background").remove()
		});
	});*/

	//get the last part from url and add it as class to the body tag
	Drupal.behaviors.pageClass = {
		attach: function (context, settings) {
			var url = document.URL;
			var clase = 'page-'+(url.substr(url.lastIndexOf('/') + 1));
			$('body').addClass(clase);
		}
	};

	// Main menu
	Drupal.behaviors.menuCollapse = {
		attach: function (context, settings) {
			$('#navigation').find('ul.menu:first').attr('id', 'main-menu');
			$('.main-menu-wrapper a').once('menu-collapse').each(function(index, el) {
				var titulo = $(this).attr('title');
				var elem = $(this).text();
				var span_d = '<br><span class="link-subtitle"> '+titulo+'</span>';
				$(this).html(elem+span_d);
			});
			$('.nav-slide-btn').once('menu-collapse').click(function(event) {
				event.preventDefault();
				$(this).toggleClass('active');
				$('.navicon').toggleClass('active');
				$('#navigation').slideToggle().toggleClass('active');
			});
			$('.main-menu-wrapper a').click(function() {
				$('.nav-slide-btn, #navigation, .navicon').removeClass('active');
				$('#navigation').slideUp();
			});
		}
	};


	//Close button into message box
	Drupal.behaviors.closeMessage = {
		attach: function (context, settings) {
			$('.close-button').on('click', function(event) {
				$(this).parent('.messages').slideUp(250,function () {
					$('.messages').remove();
				});
			});		
		}
	};


	//Show and hide the block search form
	Drupal.behaviors.visibleSearch = {
		attach: function (context, settings) {
			$('#search-trigger').on('click', function(event) {
				$(this).toggleClass('active');
				$('.custom-search-block').toggleClass('visible');
			});		
		}
	};


	//Styling some buttons
	Drupal.behaviors.nodeButtons = {
		attach: function (context, settings) {
			$('.node-links-wrapper').addClass('clearfix');	
			$('.node-links-wrapper ul').addClass('text-center clearfix').removeClass('inline');	
			$('.node-links-wrapper a').addClass('btn btn-padding btn-blue');	
			$('article:not(.node-teaser) .comment-add a').attr('href', '#comment-form-wrapper');	
			$('body.page-comment-reply .comment-add a').attr('href', '#comment-form');	
			$('input[type="submit"]:not(#edit-submit)').addClass('btn btn-red');
			$('input#edit-submit').addClass('btn btn-blue');
		}
	};


	//Iframes Responsives
	Drupal.behaviors.iFrames = {
		attach: function (context, settings) {
			$('#content iframe').once('i-frame').each(function(index, el) {
				$(this).wrap('<div class="video-responsive" style="padding-bottom:45%;position: relative;overflow: hidden;margin:auto;max-width: 800px; background:#000;"></div>');
			});	
		}
	};

	// set up navigation scroll
	Drupal.behaviors.anchorScroll = {
		attach: function (context, settings) {
			$('.comment-add a, .go-for-it').on('click',function(){
				scrollToSection($(this).attr('href'));
			})

			function scrollToSection(id) {
				if ($('body.admin-menu').length) {
					var extra = 29;
				} else{
					var extra = 0;
				};
				$('body,html').animate({scrollTop: $(id).offset().top - extra}, 1200);
			}	
		}
	};

			

})(jQuery);