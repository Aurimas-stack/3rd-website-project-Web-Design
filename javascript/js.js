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
    //Changes section height in threads depending of how many responses there're are - in order to remove white space
    if($('.u_resp_tt').length < 2 && $('.u_resp_tt') !== null) {
        $('.opend_thread').addClass("page_section_height");
    } else {
        $('.opend_thread').removeClass("page_section_height");
    }
    //Doesn't display responses container if there're none responses to a thread
    if($('.u_resp_tt_cont').children().length === 1) {
        $('.u_resp_tt_cont').css("display", "none");
    } else {
        $('.u_resp_tt_cont').css("display", "block");
    }
    //pagination for user responses
    let items = $('.u_resp_tt');
    let numItems = $(".u_resp_tt").length;
    let perPage = 10;
    items.slice(perPage).hide();
    $('.response_pagin').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        displayedPages: 3,
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
    //pagination for threads
    let posted_threads = $('.thread_title_box');
    let num_threads = $('.thread_title_box').length;
    let threadsPerPage = 5;
    posted_threads.slice(threadsPerPage).hide();
    $('.thread_pagin').pagination({
        items: num_threads,
        itemsOnPage: threadsPerPage,
        prevText: "&laquo;",
        displayedPages: 3,
        nextText: "&raquo;",
        onPageClick: function (threadNumber) {
            var showFrom = threadsPerPage * (threadNumber - 1);
            var showTo = showFrom + threadsPerPage;
            posted_threads.hide().slice(showFrom, showTo).show();
        }
    });
    //Hides word count below textarea on the form when page loads
    $('.tm-wordcount').hide();
    //Counts character count for the textarea in the submit form on the thread_maker.php page
    $('#tm-ta').on('keyup', event => {
        let post3 = $(event.currentTarget).val();
        let remaining3 = 500 - post3.length;
        if (remaining3 <= 80) {
            $('.tm-wordcount').css({
                color: 'red',
                fontSize: '1rem'
            });
        } else {
            $('.tm-wordcount').css({
                color: '#fff',
                fontSize: '1rem'
            });
        }
        $('.characters').html(remaining3);
    });
    //Shows or hides the word count depending if the textarea is focused or not
    $('#tm-ta').focus(() => {
        $('.tm-wordcount').show();
    }).focusout(() => {
        $('.tm-wordcount').hide();
    });
    //Hides word count below textarea on the form when page loads
    $('.i-wordcount').hide();
    //Counts character count for the input in the submit form on the thread_maker.php page
    $('#i-ta').on('keyup', event => {
        let post4 = $(event.currentTarget).val();
        let remaining4 = 30 - post4.length;
        if (remaining4 <= 10) {
            $('.i-wordcount').css({
                color: 'red',
                fontSize: '1rem'
            });
        } else {
            $('.i-wordcount').css({
                color: '#fff',
                fontSize: '1rem'
            });
        }
        $('.characters1').html(remaining4);
    });
    //Shows or hides the word count depending if the textarea is focused or not
    $('#i-ta').focus(() => {
        $('.i-wordcount').show();
    }).focusout(() => {
        $('.i-wordcount').hide();
    });
    //if "admin" is connected he can delete threads (and post related to that thread) from DB after clicking on trashcan
    $('.fa-trash-alt').on("click", function() {
        let threadID = ($(this).attr("id"));
        $.ajax({
            type: 'POST',
            url: 'project_form/delete_threads.php',
            cache: false,
            data: {threadID: threadID},
            success: function(data) {
                setTimeout(function(){// wait for x < secs after deletion
                    location.reload(); // then reload the page.
               }, 500); 
            },
            error: function() {
                 alert('Failed to edit!');
            }
        });
    });
    if($('#disabled_log').length > 0) {//if disabled button exists (after 3 failed attempts)
        let decrease_sec = function () { //decrease the waiting timer function (for visual display)
            $('.timing').each(function() {
                let dec_elemnt = parseInt($(this).html());
                if(dec_elemnt !== 0) {
                    $(this).html(dec_elemnt - 1);
                    
                }
            });        
        };
        setInterval(decrease_sec, 1000); //timer decreases each second
        setInterval(() => { //ajax call with interval
            $.ajax({
                url:'project_form/general_unset.php',//after 30 sec's has passed, unsets, destroys the $_SESSION variable
                success: function() { 
                    location.reload(); //reloads the page after deletion
                }
            })
        }, 30000) //real 30 second timer
    }

    
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