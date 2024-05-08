//js functions




//CAROUSEL
$(document).ready(function(){
	var myCarousel = $("#carousel-img");
	console.log(myCarousel);

  myCarousel.each(function() {
  	$(this).slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  speed: 2000,
		  autoplaySpeed: 2000,
		  dots: false,
		  adaptiveHeight: true,
  	});
  });
  	var myCarouselDescriptionItem = $(".carousel-description__item");
  	console.log(myCarousel);

    myCarouselDescriptionItem.each(function() {
    	$(this).slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  arrows: false,
			  fade: true,
			  asNavFor: '.carousel-mini__nav'
    	});
    	$('.carousel-mini__nav').slick({
    	  slidesToShow: 5,
    	  slidesToScroll: 1,
    	  asNavFor: '.carousel-description__item',
    	  dots: false,
    	  focusOnSelect: true
    	});

    });

    var myCarouselMini = $(".carousel-mini__item");

     $('.carousel-mini__item').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  arrows: false,
			  fade: true,
			  asNavFor: '.carousel-mini__nav'
			});
			$('.carousel-mini__nav').slick({
			  slidesToShow: 5,
			  slidesToScroll: 1,
			  asNavFor: '.carousel-mini__item',
			  dots: false,
			  focusOnSelect: true
			});
});

$(document).ready(function(){
  $('#carousel-main-item').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 3000,
	  speed: 2000,
	  fade: true,
  });
});



//CONTACT
$(document).ready(function(){
	$('.wpcf7-radio .wpcf7-list-item').on("click", function(e){
		if ($('.wpcf7-radio .wpcf7-list-item').hasClass("structure-color-black")) {
			$('.wpcf7-radio .wpcf7-list-item').removeClass("structure-color-black")
			$(this).toggleClass('structure-color-black')
		} else {
			$(this).toggleClass('structure-color-black')
		}
  })
})




//LOADING
$(document).ready(function(){
	$('.loading').on("click", function(e){
		$(this).css('display', "none")
	})
	$('.loading').delay(7000).fadeOut('slow')
})



//TEXT BOX CLICk
$(document).ready(function(){
	window.addEventListener('locationchange', function(){
    console.log('location changed!', $('.text-box__item__more'));
    setTimeout(function(){
    	$('.text-box__item__more').on("click", function(e){
    		$(this).toggleClass("active")
    		console.log('clicou location')
    	})
    	$('.text-box__item h4').on("click", function(e){
    		$(this).toggleClass("active")
    	})  	
    }, 0)
	})
	$('.text-box__item h4').on("click", function(e){
		$(this).toggleClass("active")
	})
})

$(document).ready(function(){
	$('.text-box__item__more').on("click", function(e){
		console.log('clicou out location')
		$(this).toggleClass("active")
	})
	if($('.text-box__item__more a')){
		$('.text-box__item__more').on("click", function(e){x
			$(this).removeClass("active")
		})
	}

})

//BACKGROUND-COLOR MENU
// $(document).ready(function(){
// 		const backgroundColor = $('main').css('background-color')
// 		const color = $('main').css('color')
// 		$('header').css('background-color', backgroundColor)
// 		$('ul#main-menu').css('background-color', backgroundColor)
// 		$('#mobile-menu-trigger div span').css('background-color', color)
// 		$('footer').css('background-color', backgroundColor)
// 		$('header').css('color', color)
// 		$('footer').css('color', color)
// 		$('footer svg').css('fill', color)
// 		$('header svg').css('fill', color)
// 		$('header h1').css('color', color)
// 		$('#main-menu li a').css('color', color)

// 	// }
// })

//ABOUT SCROLL
$(document).ready(function(){
	$(function() {
	  $('.arrow').click(function(e) {
	  	const heightElement = window.pageYOffset
	      $('html, body').animate({ scrollTop: $('html').offset().top  + heightElement + 600}, 1000);
	  });
	});
})


//ABOUT TAMANHO DO FIXED
$(document).ready(function(){
	$(function() {
		const w = $(window).height()
		const h = $('.about__content__fixed-right').height()
	  const height = w - h - 175
	  $('#part-3').css('margin-bottom', height)
	});
})
//MENU
$(document).ready(function(){
	$(window).on('scroll', function(event) {
			const heightElement2 = window.pageYOffset
				if (heightElement2 > 150) {
					$('header').addClass('header-animation-small')
					$('header').removeClass('header-animation-bigger')
				} else {
					$('header').removeClass('header-animation-small')
					$('header').addClass('header-animation-bigger')
				} 
			// }
		})
})


$(document).ready(function(){
	$('#calendar_booking1 .datepick-header span').text('oct');
	console.log(	$('.datepick-header span').text('oct'))
});



///////////////////CAROUSEL/////////////////////////////
$(document).ready(function(){
	function initializeCarousel() {
	  $('.carousel__imgs').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		speed: 1000,
		autoplaySpeed: 3000, // Alterei para 3 segundos para uma transição mais suave
		dots: true,
		fade: true,
		waitForAnimate: false,
	  });
  
	  setTimeout(function() {
		var dots = $('.slick-dots li');
		dots.each(function(k, v){
		  $(this).find('button').addClass('heading' + k);
		});
  
		var items = $('.carousel__imgs').slick('getSlick').$slides;
		items.each(function(k, v){
		  var text = $(this).find('h2').text();
		  $('.heading' + k).text(text);
		});
	  }, 2000);
  
	  $('.carousel__imgs__item__img').on('click', function(e){
		$('.carousel__imgs').slick('slickPause');
	  });
  
	  $('.slick-dots li button').on('click', function(e){
		$('.carousel__imgs').slick('slickPause');
	  });
	}
  
	function checkScreenWidth() {
	  if ($(window).width() > 850) {
		initializeCarousel();
	  } else {
		// Se a largura da tela for menor que 850px, destrua o carrossel se estiver inicializado
		if ($('.carousel__imgs').hasClass('slick-initialized')) {
		  $('.carousel__imgs').slick('unslick');
		}
	  }
	}
  
	// Chamar a função ao carregar a página e redimensionar a tela
	checkScreenWidth();
	$(window).resize(checkScreenWidth);

	//back to top
	function scrollToTop() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    }

    // Evento de clique no botão "Back to Top"
    $('.animationbacktotop').click(function(e) {
		e.preventDefault()
        scrollToTop();
    });
});
  
  
  







