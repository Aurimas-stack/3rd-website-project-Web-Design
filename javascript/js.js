//jQuery functions 
$(document).ready(() => {
    //Changes site-header CSS on scroll
    $(window).on("scroll touchmove", () => {
        if ($(document).scrollTop() > 0) {
            $('.site-header').css({
                height: '45px',
                padding: '10px',
                backgroundColor: '#f7f7f7'

            });
        } else {
            $('.site-header').css({
                height: '86px',
                padding: '10px',
                backgroundColor: '#fff',
                transition: 'height 600ms ease-in-out, padding 600ms ease-in-out'
            });
        }
    });
    //Counts character count for the textarea("project_details") in the submit form on the homepage
    $('#home-form-ta').on('keyup', event => {
        let post = $(event.currentTarget).val();
        let remaining = 500 - post.length;
        if (remaining <= 80) {
            $('.ta-wordcount').css({
                color: '#F7CD60',
                fontSize: '0.9rem'
            });
        } else {
            $('.ta-wordcount').css({
                color: '#fff',
                fontSize: '0.8rem'
            });
        }
        $('.characters').html(remaining);
    });
    //Hides word count below textarea on the form when page loads
    $('.ta-wordcount').hide();
    //Shows or hides the word count depending if the textarea is focused or not
    $('#home-form-ta').focus(() => {
        $('.ta-wordcount').show();
    }).focusout(() => {
        $('.ta-wordcount').hide();
    });
    //Animation for Home hero container after page load
    $('#home-hero > .container').addClass('slide-bottom');
    //Animation for wwd section boxes after page load
    $(window).on("scroll touchmove", () => {
        if ($('.wwd-box').length && $(window).scrollTop() + $(window).height() - 35 >= $('.wwd-boxes').offset().top) {
                $('.wwd-box').addClass('puff-in-center');
        }
    });
    //Animation for wwd-icons elements  after page load
    $(window).on("scroll touchmove", () => {
        if ($('.wwd-icons').length && $(window).scrollTop() + $(window).height() - 60 >= $('.wwd-icons').offset().top) {
            $('.wwd-icons').addClass('flip-in-hor-bottom');
        }
    });
    //Animation for recent-work section boxes after page load
    $(window).on("scroll touchmove", () => {
        if ($('#recent-work').length && $(window).scrollTop() + $(window).height() - 25 >= $('#recent-work').offset().top) {
            $('#recent-work').addClass('scale-in-center');
        }
    });
    //Counts character count for the textarea("project_details") in the submit form on the contact page
    $('#contact-form-ta').on('keyup', event => {
        let post2 = $(event.currentTarget).val();
        let remaining2 = 500 - post2.length;
        if (remaining2 <= 80) {
            $('.ta-wordcount').css({
                color: '#F7CD60',
                fontSize: '0.9rem'
            });
        } else {
            $('.ta-wordcount').css({
                color: '#fff',
                fontSize: '0.8rem'
            });
        }
        $('.characters').html(remaining2);
    });
    //Shows or hides the word count depending if the textarea is focused or not
    $('#contact-form-ta').focus(() => {
        $('.ta-wordcount').show();
    }).focusout(() => {
        $('.ta-wordcount').hide();
    });
    //Animation for portfolio hero container after page load
    $('.port-hero > .container').addClass('slide-bottom');
    //Animation for portfolio projects section boxes after page load
    $('.port-project').addClass('slide-bottom');
    //Animation for page-pricing pricing hero container after page load
    $('.pricing-hero > .container').addClass('slide-bottom');
    //Animation for page-pricing pricing-prices section after page load
    $('.pricing-prices').addClass('slide-bottom');
    //Animation for page-pricing build-something section after page load
    $(window).on("scroll touchmove", () => {
        if ($('.build-something').length && $(window).scrollTop() + $(window).height() - 15 >= $('.build-something').offset().top) {
            $('.build-something > .container').addClass('slide-left');
        }
    });
    //Animation for page-pricing day-support section after page load
    $(window).on("scroll touchmove", () => {
        if ($('.day-support').length && $(window).scrollTop() + $(window).height() - 45 >= $('.day-support').offset().top) {
            $('.day-support > .container').addClass('slide-bottom');
        }
    });
    //Animation for page-pricing trustworthy section after page load
    $(window).on("scroll touchmove", () => {
        if ($('.trustworthy').length && $(window).scrollTop() + $(window).height() - 85 >= $('.trustworthy').offset().top) {
            $('.trustworthy > .container').addClass('slide-bottom');
        }
    });
    //Animation for page-pricing our-quote section after page load
    $(window).on("scroll touchmove", () => {
        if ($('.our-quote').length && $(window).scrollTop() + $(window).height() - 105 >= $('.our-quote').offset().top) {
            $('.our-quote > .container').addClass('slide-left');
        }
    });
    //Animation for contact page hero container after page load
    $('#contact-hero > .container').addClass('slide-bottom');
    //Animation for contact page contact-info section after page load
    $('#contact-info').addClass('slide-bottom');
    //Scroll to the top of page  after clicking header "double arrow" icon
    $('.fa-angle-double-up').on('click', () => {
        $('body, html').animate({
            scrollTop:0,
        }, 800);
        return false;
    });


});

//javascript site header mobile menu show function
function displayMobileNav() {
    let x = document.getElementById("mobMenu");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
//Google maps for Contact Page (will not load completely because billing is not used atm)
let map;

function myMap() {
  const mapOptions = {
    zoom: 8,
    center: { lat: -34.397, lng: 150.644 },
  };
  map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
  const marker = new google.maps.Marker({
    position: { lat: -34.397, lng: 150.644 },
    map: map,
  });
  const infowindow = new google.maps.InfoWindow({
    content: "<p>Marker Location:" + marker.getPosition() + "</p>",
  });
  google.maps.event.addListener(marker, "click", () => {
    infowindow.open(map, marker);
  });
}