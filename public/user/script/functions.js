jQuery(document).ready(function($) {

	'use strict';
    //***************************
    // Sticky Header Function
    //***************************
	  jQuery(window).scroll(function() {
	      if (jQuery(this).scrollTop() > 70){
	          jQuery('body').addClass("motivz-sticky");
	      }
	      else{
	          jQuery('body').removeClass("motivz-sticky");
	      }
	  });

    $('.click-promo').click(function () {
        $('.input-field').slideToggle();
    });

$('.advanc-serch').click(function () {
  $('.job-filters-top').slideToggle();
})
    //***************************
    // BannerOne Functions
    //***************************
      jQuery('.images-slide').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
          infinite: true,
          dots: false,
          arrows: false,
          fade: true,
        });
      jQuery('.images-slide2').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 5000,
          infinite: true,
          dots: false,
          arrows: false,
          fade: true,
        });
      jQuery('.images-slide3').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 6000,
          infinite: true,
          dots: false,
          arrows: false,
          fade: true,
        });
      jQuery('.images-slide4').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 7000,
          infinite: true,
          dots: false,
          arrows: false,
          fade: true,
        });
      jQuery('.mm-image-slide').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          infinite: true,
          dots: false,
          arrows: false,
          fade: true,
        });
      jQuery('.post-slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
          infinite: true,
          dots: true,
          arrows: false,
          fade: false,
        });


      //***************************
    // Testimonial Functions
    //***************************
      jQuery('.featured-slide').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          infinite: true,
          centerMode: true,
          dots: false,
          prevArrow: "<span class='slick-arrow-left'><i class='fa fa-angle-left'></i></span>",
          nextArrow: "<span class='slick-arrow-right'><i class='fa fa-angle-right'></i></span>",
          fade: false,
          responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 400,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });


$('.mm-dropdown').parents('li').addClass('add-icon');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

Tu.tScroll({
      't-element': '.fadeLeft,.fadeRight,.fadeIn,.bounceOut,.zoomOut,.slideDown,.fadeUp,.fadeDown'
    });


    // end

});
// $( window ).on("load", function() { $('.close-job-detail').click();});
$('.drop1').click(function () {$('#drop1').slideToggle('fast')});
$('.drop2').click(function () {$('#drop2').slideToggle('fast')});


// Add smooth scrolling to all links
      $("a.bottom-scroll").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 1000, function(){
          });
          return false;
        } // End if
      });
