//current menu link bold
jQuery(document).ready(function($) {
    var url = window.location.href;
    $('.menu-item a').each(function() {
        if (url == (this.href)) {
            $(this).closest('.menu-item').addClass('current-menu-item');
        }
    });
});




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
	$('#carousel-arrow-item').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			speed: 2000,
			arrows: true,
			fade: true,
		});
	$('#carousel-project').slick({
		centerMode: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		speed: 2000,
		dots: true,
	});
});




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


//ABOUT SCROLL
$(document).ready(function(){
	$(function() {
	  $('.arrow').click(function(e) {
	  	const heightElement = window.pageYOffset
	      $('html, body').animate({ scrollTop: $('html').offset().top  + heightElement + 600}, 1000);
	  });
	});
})
//MENU OPEN

$(document).ready(function(){
	$('#mobile-menu-trigger').on("click", function(e){
		$('#main-header').toggleClass('menu-open');
		$('#footer').toggleClass('footer-sticky');
	});
});


//ABOUT TAMANHO DO FIXED
$(document).ready(function(){
	$(function() {
		const w = $(window).height()
		const h = $('.about__content__fixed-right').height()
	  const height = w - h - 175
	  $('#part-3').css('margin-bottom', height)
	});
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
			console.log("clicou em cima");
		});
	  	$('.slick-dots li button').mouseenter(function() {
			$(this).click();
		});
		$('.slick-dots li button').mouseleave(function() {
			$('.carousel__imgs').slick('slickPlay');
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
  
document.addEventListener("DOMContentLoaded", function() {
	// Verifica se há um elemento com ID 'cinza'
	if (document.getElementById("cinza")) {
		// Se existir, aplica o background cinza no cabeçalho e no rodapé
		document.getElementById("main-header").style.backgroundColor = "#e7e7e7";
		$("body").css("backgroundColor", "#e7e7e7" );
		document.getElementById("main-header").style.backgroundColor = "#e7e7e7";
		document.getElementById("main-menu-container").style.backgroundColor = "#e7e7e7";
		document.getElementById("footer").style.backgroundColor = "#e7e7e7";
	  }
  });
  
  







