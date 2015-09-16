
$(function() {
    var _viewport = {
		width : $(window).width(),
		height : $(window).height()
	}

	$('.overlay-brown div').width($(window).width());
    
    var _navSubHeight = '';

 	
    setTimeout(function(){
		$('.wrapper').addClass('intel-active');

		//$(window).scrollTop(0);
    }, 4000);

   	if($('.wrapper').hasClass('wrapper-2')) {
   		 setTimeout(function(){
	   		$('.wrapper').addClass('header-animate');
	    }, 3900);
	    setTimeout(function(){
			$('.wrapper').removeClass('header-animate');
	    }, 4500);
	}
	

	if(_viewport.width <= 1200) {
		_navSubHeight = '150px';
	} else {
		_navSubHeight = '192px';
	}

    mobileClass(_viewport.width);
	imageHero();
	initPageAnim();
	changeImageMobile();
	//countDownTimer();

	$(".modal-btn").fancybox({
   		'closeBtn':false
	});	


	$('.btn-close').click(function(e){
		e.preventDefault();
		$('.wrapper').removeClass('intel-active');
		
		$('.wrapper').addClass('intel-close');

		if($('.wrapper').hasClass('wrapper-2')) {

		}
	
	});

	var navContainer = $('.main-nav');
	var navItem = navContainer.children('li');
	navItem.each(function(){
		var _item = $(this), tweenItem;
		_item.on('click', function(){
			var _this = $(this);
			_this.siblings().removeClass('active');
			_this.addClass('active');
		});

	});

	$('.hamburger').click(function(e){
		e.preventDefault();
		var _this = $(this);
		if(_this.hasClass('active')){

			if(_viewport.width <= 1200) {
				$('body').removeClass('scroll-lock');
			} else {

				$('.wrapper').addClass('animate');
				setTimeout(function(){
					$('.wrapper').removeClass('animate');
				},700);
			}


				$('.header').removeClass('navigation-active');

		} else { // not active
				
				$('.header').addClass('navigation-active nav-animate');
				setTimeout(function(){
					$('.header').removeClass('nav-animate');
				},500);
				
					$('.wrapper').addClass('animate');
					setTimeout(function(){
						$('.wrapper').removeClass('animate');
					},700);

				if(_viewport.width <= 1200) {
					setTimeout(function(){
						$('body').addClass('scroll-lock');
					},1000);

				} else {
				}
		}	

	});


	$('.wrap-nav li a[href*=#]:not([href=#])').click(function(e) {
		e.preventDefault();
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      $(this).parent().addClass('active').siblings().removeClass('active');
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - 201
	        }, 1000);
	        return false;
	      }
	    }
	  });
	


	if($('body').find('#vehicle').length == 1) {

		var maxHeight = 0;
		$('.video-row').each(function(){
			
			$(this).find('.video-desc').each(function(){
				$(this).each(function(index){

					if ($(this).outerHeight() > maxHeight) { 
		                maxHeight = $(this).outerHeight();     
		            }

		            $(this).outerHeight(maxHeight);
		        });

			});

		});


	}


	//CONTACT US PAGE CLICK
	if($('body').find('#contact-us').length == 1) {

		$('.contact button').click(function(e){
			e.preventDefault();
			$('.input-item').each(function(){
				if($(this).find('.input-field').val().length == 0) {

			
					$(this).addClass('required')
					
				} else {
					if($(this).find('.input-field').attr('id') == 'contact-email') {
						if( !validateEmail($('#contact-email').val())) {
							$(this).addClass('required')
						}
						else {
							$(this).removeClass('required');
						}
					} else {
						$(this).removeClass('required');
					}
				}
			});
		});



	}


 	/*$('.tile-item-img').each(function(){
 		var _timeOut = '';
 		$(this).on('mouseenter', function(e){

 			if(!$(this).hasClass('hover')) {
 				$(this).addClass('hover');
 			}
 			_timeOut = setTimeout(function(){
 				$(this).addClass('done-hover');
 			}, 1000);

 		}).on('mouseleave', function(e){
 			clearTimeout(_timeOut);
 			$(this).removeClass('hover');
 		});
 	});
*/


	if(_viewport.width <= 768) {
		var contactus = $('.footer .footer-block').eq(0).children('h1');
		var contact = contactus.text().slice(0, -2)
		contactus.text(contact);
	}

});



$(window).resize(function(){   
	var _viewport = {
		width : $(window).width(),
		height : $(window).height()
	}
	if(_viewport.width <= 1200) {
		if(!$('.wrapper').hasClass('resize')) {

			$('.wrapper').addClass('resize');
			setTimeout(function(){
				$('.wrapper').removeClass('resize');
			},1);
		}
	}

	changeImageMobile();
	imageHero();
	initPageAnim();
	mobileClass(_viewport.width);

//	countDownTimer();

		$('.hamburger').click(function(e){
		e.preventDefault();
		var _this = $(this);
		if(_this.hasClass('active')){

			if(_viewport.width <= 1200) {
				$('body').removeClass('scroll-lock');
			} else {

				$('.wrapper').addClass('animate');
				setTimeout(function(){
					$('.wrapper').removeClass('animate');
				},700);
			}


				$('.header').removeClass('navigation-active');

		} else { // not active
				
				$('.header').addClass('navigation-active nav-animate');
				setTimeout(function(){
					$('.header').removeClass('nav-animate');
				},500);
				
					$('.wrapper').addClass('animate');
					setTimeout(function(){
						$('.wrapper').removeClass('animate');
					},700);

				if(_viewport.width <= 1200) {
					setTimeout(function(){
						$('body').addClass('scroll-lock');
					},1000);

				} else {
				}
		}	

	});
	

	$('.overlay-brown div').width($(window).width());

});



			var _top = $(window).scrollTop();
			var _direction;

$(window).scroll(function(e) {
	var _viewport = {
		width : $(window).width(),
		height : $(window).height()
	}
    var height = $(window).scrollTop();

	parallax();
	console.log(height);

	if(!$('.wrapper').hasClass('wrapper-2')) {

		if(_viewport.width > 1200) {

			if($('.wrapper').hasClass('intel-active')) {

				if(height >= $('.get-intel').height()) {
					addRemoveClasses('.wrapper', 'intel-hide', true);
				} else {
					addRemoveClasses('.wrapper', 'intel-hide', false);
				}


			}

			if($('body').find('#home').length == 1) {

				if(height >= $('.hero-overlay').height()+600 - 131) {
					addRemoveClasses('.header', 'scrolling', true);
				} else {
					addRemoveClasses('.header', 'scrolling', false);
				}
			} 

			if($('body').find('#vehicle').length == 1) {
				if(height >= $('.hero-overlay').height() - 131) {
					addRemoveClasses('.header', 'scrolling', true);
				} else {
					addRemoveClasses('.header', 'scrolling', false);
				}
			}

			/*if(height >= 1044) {
				addRemoveClasses('.wrap-navigation', 'sticky', true);
			} else {
				addRemoveClasses('.wrap-navigation', 'sticky', false);
			}*/

			var targetHeight = 0;
			if($('.wrapper').hasClass('intel-close')) {
				targetHeight = 890;
			} else {
				targetHeight = 990;
			}
			


			if(height >= targetHeight) {	
				addRemoveClasses('.wrap-navigation', 'sticky', true);
			} else {
				addRemoveClasses('.wrap-navigation', 'sticky', false);
			}


		} else { // screen smaller than 1200

			    var _cur_top = $(window).scrollTop();

			    if ( $(window).scrollTop()  >= 100) {
			    	if(_top < _cur_top)
				    {
				        $('.main-header').removeClass('header-active');
				        $('.main-header').addClass('main-header-hide');
				    }
				    else
				    {
				        $('.main-header').addClass('header-active');
				        $('.main-header').removeClass('main-header-hide');
				    }
				    _top = _cur_top;
				} else {
					$('.main-header').removeClass('header-active');
				}
		


			if($('.wrapper').hasClass('intel-active')) {

				if(height >= $('.get-intel').height()) {
					addRemoveClasses('.wrapper', 'intel-hide', true);
				} else {
					addRemoveClasses('.wrapper', 'intel-hide', false);
				}


			}

			if(!$('.wrapper').hasClass('intel-close')) {

				if(height >= 1199) {
					addRemoveClasses('.wrap-navigation', 'sticky', true);
				} else {
					addRemoveClasses('.wrap-navigation', 'sticky', false);
				}

			} else {
				if(height >= 1167) {
					addRemoveClasses('.wrap-navigation', 'sticky', true);
				} else {
					addRemoveClasses('.wrap-navigation', 'sticky', false);
				}
			}

		}

	} else { // page vehicle overview

		if(_viewport.width > 1200) {

			if($('.wrapper').hasClass('intel-active')) {

				if(height >= $('.get-intel').height()) {
					addRemoveClasses('.wrapper', 'intel-hide', true);
				} else {
					addRemoveClasses('.wrapper', 'intel-hide', false);
				}

			}

			var targetHeight = 0;
			if($('.wrapper').hasClass('intel-close')) {
				targetHeight = 349;
			} else {
				targetHeight = 449;
			}
			if(height >= targetHeight) {
				addRemoveClasses('.wrap-navigation', 'sticky', true);
			} else {
				addRemoveClasses('.wrap-navigation', 'sticky', false);
			}
			

		} else {
				if($('.wrapper').hasClass('intel-active')) {

					if(height >= $('.get-intel').height()) {
						addRemoveClasses('.wrapper', 'intel-hide', true);
					} else {
						addRemoveClasses('.wrapper', 'intel-hide', false);
					}

				}

			
			var targetHeight = 0;
			if($('.wrapper').hasClass('intel-close')) {
				targetHeight = 724;
			} else {
				targetHeight = 790;
			}

			if(height >= targetHeight) {
				addRemoveClasses('.wrap-navigation', 'sticky', true);
			} else {
				addRemoveClasses('.wrap-navigation', 'sticky', false);
			}
		}
	}
	
	if(_viewport.width > 1024 && $('#home').find('.hero-image').length != 0) {
		
				if($(window).scrollTop() > $('.hero-image').offset().top && $(window).scrollTop() < $('.about').offset().top) {
					var currScroll = $(window).scrollTop();
					var heroOffset = $('.hero-image').offset().top;
					var maxScroll = heroOffset + 600;
					var scrollPercent = (currScroll - heroOffset) / maxScroll;

					$('.overlay-brown').css({
						width: scrollPercent <= 1 ? eval(scrollPercent * 100) + "%" : '100%'
					});
				} else if($(window).scrollTop() >= $('.about').offset().top) {
					$('.overlay-brown').css({
						width: '100%'
					})
				} else if($(window).scrollTop() <= $('.hero-image').offset().top) {
					$('.overlay-brown').css({
						width: 0
					})		
				}
			
	}

});

function addRemoveClasses(selector, className, condition) {
	if(condition == true) {	
		if(!$(selector).hasClass(className)) {
			$(selector).addClass(className);
			if(selector == '.wrap-navigation') {
				$(selector).next().css({'margin-top':'70px'});
			}

		}
	} else {
		if($(selector).hasClass(className)) {
			$(selector).removeClass(className);
			if(selector == '.wrap-navigation') {
				$(selector).next().css({'margin-top':'0'});
			}
		}
	}
}


function changeImageMobile() {
	var _vehicleImage = $('.vehicle-item');
	_vehicleImage.each(function(){
		var _this = $(this);
		if($('body').hasClass('mobile')) {
			var _newImg = _this.find('img').data('mobile-image');
			_this.find('img').attr('src', theme_path+'images/'+_newImg);
		} else {
			var _newImg = _this.find('img').data('desktop-image');
			_this.find('img').attr('src', theme_path+'images/'+_newImg);
		}
	});
}

function imageHero() {
	var _viewport = {
		width : $(window).width(),
		height : $(window).height()
	}
	var wH = window.innerHeight ? window.innerHeight : $(window).height();
	var wW = window.innerWidth ? window.innerWidth : $(window).width();
	//jQuery('.hero-container').css('height',wH - 20);
	var _additionHeight = 0;
	if(_viewport.width <= 480) {
		_additionHeight = 35+50;
	} else {
		_additionHeight = 75+100;
	}
	$('.hero-overlay, .hero-image, .hero-container, .hero-overlay2').css({
		'height': wH+_additionHeight
	});

	//$('.auction-timer').css({bottom: 100+100 + 'px'});


}

function last_child() {
  //if ($.browser.msie && parseInt($.browser.version, 10) <= 8) {
    $('*:last-child').addClass('last-child');
  //}
}

function scrollLock(active) {

	if($('body').hasClass('mobile')) {
		if(active) {
			$('body').addClass('scroll-lock');
		} else {
			$('body').removeClass('scroll-lock');
		}
	} else {

			$('body').removeClass('scroll-lock');
	}
}

function getRelativeDate(days, hours, minutes){
    var date = new Date((new Date()).getTime() + 60000 /* milisec */ * 60 /* minutes */ * 24 /* hours */ * days /* days */);

    date.setHours(hours || 0);
    date.setMinutes(minutes || 0);
    date.setSeconds(0);

    return date;
}

function initPageAnim( viewport ) {
   	if(!$('body').hasClass('device')) {

    	$('.animated').addClass('hiding');
        $('.animated').appear(function() {

            var element = $(this);
            if(element.hasClass('counter-cont')) {
            	element.addClass('active');
            	
            }
            var animation = element.data('animation');
            var animationDelay = element.data('delay');
            if(animationDelay) {
                setTimeout(function(){
                    element.addClass( animation + " visible" );
                    element.removeClass('hiding');
                }, animationDelay);
            } else {
                element.addClass( animation + " visible" );
                element.removeClass('hiding');
            }


        }, {accY: -50});
    } else {
    	$('.animated').removeClass('hiding');
    }
}

function parallax() {
	if (!$('body').hasClass('device')) {
		parallaxBackground( $('.hero-overlay'), 0.7 );
	};
}

function parallaxBackground( imgDiv, multiplier ) {

	if ( imgDiv.size() > 0 ) {
		var wH = window.innerHeight ? window.innerHeight : jQuery(window).height();
		var imgPar = imgDiv;

		//var imgParPercY = ( imgPar.offset().top + imgPar.outerHeight(false)/2 - jQuery(window).scrollTop() ) / imgPar.outerHeight(false);
		//var imgParPercY = ( imgPar.offset().top - jQuery(window).scrollTop() ) / imgPar.outerHeight(false);
		var imgParPercY = (  jQuery(window).scrollTop() );

		//console.log(imgParPercY);
		var parallaxHeight = imgPar.outerHeight(false);

		//console.log( imgParPercY, parallaxHeight );

		var newH = Math.round( (imgParPercY) * multiplier/4 );
		imgDiv.css({
			'top': ' -' + newH + 'px'
		});
	}
}

function mobileClass(viewport) {	

	if(viewport <= 768) {
		$('body').addClass('mobile');	
	} else {
		$('body').removeClass('mobile');
	}

	if(viewport <= 1024) {
		$('body').addClass('device');	
	} else {
		$('body').removeClass('device');
	}
	
}
/*
function countDownTimer() {
	if($('body').hasClass('mobile')) {
		$('#countdown3').timeTo({
		    timeTo: new Date(new Date('Thu Sep 10 2015 09:00:00 GMT+0800 (PHT)')),
		    displayDays: 2,
		    displayCaptions: true,
		    fontSize: 65,
		    captionSize: 10
		}); 

	} else {
		$('.countdown').timeTo({
		    timeTo: new Date(new Date('Thu Sep 10 2015 09:00:00 GMT+0800 (PHT)')),
		    displayDays: 2,
		    displayCaptions: true,
		    fontSize: 65,
		    captionSize: 10
		}); 

		

	}
}

*/
function CountDownTimer(dt, id) {
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function pad2(number) {
	   return (number < 10 ? '0' : '') + number
	}

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            //document.getElementById(id).innerHTML = 'EXPIRED!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        /*document.getElementById(id).innerHTML = days + 'days';
        document.getElementById(id).innerHTML += hours + 'hrs ';
        document.getElementById(id).innerHTML += minutes + 'mins ';
        document.getElementById(id).innerHTML += seconds + 'secs';*/
        $(id + ' .day .dt-num').text(pad2(days));
        $(id + ' .hr .dt-num').text(pad2(hours));
        $(id + ' .min .dt-num').text(pad2(minutes));
        $(id + ' .sec .dt-num').text(pad2(seconds));
    }


    timer = setInterval(showRemaining, 1000);
}


function validateEmail(email) {
    var res = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return res.test(email);
}


