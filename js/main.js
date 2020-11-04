jQuery.noConflict();
    (function ($) {
        function readyFn() {

	        // Mobile check
	        isMobile = false;
	
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
				isMobile = true;
			}
			
			//$('body').scrollspy({ target: '#navbar-menu', offset: 150});
			
			function scrollTo(hash) {
			    location.hash = "#" + hash;
			}

			/*
			$('header nav ul li a, .horizontal-sroll-menu a, .vc_btn3, .order').on('click', function(event) {
				
				    if (this.hash !== "" && $(this).attr("id") !== "submit" ) {
	
				      event.preventDefault();
				      var hash = this.hash;
	
				      $('html, body').animate({
				        scrollTop: $(hash).offset().top
				      }, 400, function(){ 
				        window.location.hash = hash;
				      });
				    }  	
				
			});	
			*/
			
		
			$('header nav ul li a, .horizontal-sroll-menu a, .vc_btn3, .order').on('click', function(event) {

				if($(".home").length) {

				    if (this.hash !== "" && $(this).attr("id") !== "submit" ) {
	
				      event.preventDefault();
				      var hash = this.hash;
	
				      $('html, body').animate({
				        scrollTop: $(hash).offset().top
				      }, 400, function(){ 
				        window.location.hash = hash;
				      });
				    }  	
					
				} else {
					var hash = this.hash;

					if (hash != '' && $(this).attr("id") !== "submit" ) {

					
					var lang = $("html").attr("lang");
					var locale;

					if (lang == "ru-RU") {
						locale = "/ru/";
					} else if (lang == "en-US") {
						locale ="/en/";
					} else if (lang == "et") {
						locale ="";
					}


					var hash = this.hash;
					var site = "http://kokteil.local/";
					

					var url = site + locale + hash;
					
					$(this).attr("href", url);

					}
				}

				
			});	
		
			

    		$("body").on("click", '#menubtn, .menu.open .mob-nav a, .menu.open .vc_btn3', function(){
				$('.menu, .mob-header').toggleClass('open');
				$('.mob-header .logo, .mob-header .mobile-mini-cart').toggleClass('hide');

			});
			
			var menuTopAnim = false;
			
			if($(window).scrollTop() > 60){
				
			        if(menuTopAnim === false)
			        { 
			            menuTopAnim = true;
			            $(".menu").addClass("sticky");
			        }
			}   
			
			if ($('.title-banner').length) {
				if ($('.title-banner-1, .product-title-banner-1, .product-title-banner-2').css('background-color') === 'rgb(255, 246, 246)') {
					$(".menu").addClass("sticky");
					$(".mob-header .logo").hide();	
					$(".mob-header .logo.black").show();	
				} else {
				 	stickyScroll();
				}
			} else {
				stickyScroll();
			}

    		// Menu white bgd on scroll
			
			function stickyScroll() {
	
    		$(window).scroll(function(){            
			
			    if($(window).scrollTop() > 60)
			    {
			        if(menuTopAnim === false)
			        { 
			            menuTopAnim = true;
			            $(".menu").addClass("sticky");
			        }
			    }       
			    else 
			    {
			        if(menuTopAnim === true)
			        { 
			            menuTopAnim = false;
			            $(".menu").removeClass("sticky");
			            
			        }
			    }
			});

			}
			
			const video = document.getElementById('movie');	
			$('#movie').on('click', function(event) {
				$(".play-btn").toggleClass("off");
			});
			$('.play-btn').click(function(){video.paused?video.play():video.pause(); $(".play-btn").toggleClass("off");});

		    //Mobile menu hide onScroll and video stop
				
			
			var didScroll;
			var lastScrollTop = 0;
			var delta = 5;
			var navbarHeight = $('.mob-header').outerHeight();
			
			$(window).scroll(function(event){
			    didScroll = true;
			});
			
			setInterval(function() {
			    if (didScroll) {
			        hasScrolled();
			        didScroll = false;
			    }
			}, 250);
			
			function hasScrolled() {
			    var st = $(this).scrollTop();
			    
			    // Make sure they scroll more than delta
			    if(Math.abs(lastScrollTop - st) <= delta)
			        return;
			    
			    // If they scrolled down and are past the navbar, add class .nav-up.
			    // This is necessary so you never see what is "behind" the navbar.
			    
			    //if(isMobile){
				if(!$(".menu").hasClass("open")){
				    if (st > lastScrollTop && st > navbarHeight*4){
				        // Scroll Down
				        $('.mob-header').removeClass('nav-down').addClass('nav-up');
	
				    } else if (st < navbarHeight*0.8) {
						$('.mob-header').removeClass('nav-up').removeClass('nav-down');
				    } else {
				        // Scroll Up
				        if(st + $(window).height() < $(document).height()) {
       
				            $('.mob-header').removeClass('nav-up').addClass('nav-down');
				          
						}  
				    } 
				}
			    //}
			    if($(".video-row").length){
				    if (st > $(window).height()) {
					    
					    if (!video.paused){
						   video.pause(); 
						   $(".play-btn").toggleClass("off");
					    }
					            
				    }   
			    } 
			    
			    lastScrollTop = st;
			}

			// Mini cart show when added. 
			
			$(document.body ).on( 'added_to_cart', function(){
				timeoutNumber = 0;
				$('.mini-cart .cart-content-wrap').addClass('show-minicart');

				timeoutNumber = setTimeout(function () {
					$('.show-minicart').removeClass('show-minicart');
				}, 3500);
			});

			
			// TweenMax FX

			var controller;
			
			controller = new ScrollMagic.Controller();
		
			$(".fx-op-up").each(function (index, elem) {
		        var imgTween = TweenMax.fromTo(elem, 0.6, {opacity: 0, y:50, rotationY:0.0001, z:0.001}, {opacity: 1, y:0, rotationY:0.0001, z:0.001, ease:Power1.easeInOut}, .15);
		        
		        linkScene = new ScrollMagic.Scene({
			        	offset: 20, 
		                triggerElement: elem,
		                triggerHook: "onEnter",
		            })
		            .setTween(imgTween)
		            .addTo(controller);
		    });
				   
			$(".fx-op-right").each(function (index, elem) {
		        var imgTween = TweenMax.fromTo(elem, 0.6, {opacity: 0, x:50,}, {opacity: 1, x:0, ease:Power1.easeInOut}, .25);
		        
		        linkScene = new ScrollMagic.Scene({
			        	offset: 50,  
		                triggerElement: elem,
		                triggerHook: "onEnter",
		            })
		            .setTween(imgTween)
		            .addTo(controller);
		    });
		    
		    $(".fx-op-left").each(function (index, elem) {
		        var imgTween = TweenMax.fromTo(elem, 0.6, {opacity: 0, x:-50,}, {opacity: 1, x:0, ease:Power1.easeInOut}, .25);
		        
		        linkScene = new ScrollMagic.Scene({
			        	offset: 50,  
		                triggerElement: elem,
		                triggerHook: "onEnter",
		            })
		            .setTween(imgTween)
		            .addTo(controller);
			});
					
        }

        $(document).ready(readyFn); 
        
})(jQuery);

(function($) {
    $.fn.isBgColor = function(color) {
        var thisBgColor = this.eq(0).css('backgroundColor');
        var computedColor = $('<div/>').css({ 
            backgroundColor: color
        }).css('backgroundColor');
        return thisBgColor === computedColor;
    }
})(jQuery);