jQuery(document).ready(function($) {

    var alturaUno =$('#principal-menu').offset().top;

    $(window).on('scroll', function(){
        if($(window).scrollTop() > alturaUno){
            $('#principal-menu').addClass('menu-fixed')
        }else{
             $('#principal-menu').removeClass('menu-fixed')
        }
    });

    var altura =$('.menu-bars').offset().top;

    $(window).on('scroll', function(){
        if($(window).scrollTop() > altura){
            $('.bar-aux').addClass('menu-fixed-responsive')
        }else{
             $('.bar-aux').removeClass('menu-fixed-responsive')
        }
    });

    $('div.menu-bars').click (function() {
        event.preventDefault();
        $('#principal-menu').toggleClass('active');
    });
	$('.js-resizing').each(function(index, el) {
        $.resizing($(this));
    });


    $('.btn-menu').on('click', function(event) {
        event.preventDefault();
        if($($(this).attr('data-menu')).hasClass('active'))
            $($(this).attr('data-menu')).removeClass('active');
        else
            $($(this).attr('data-menu')).addClass('active');
    });

  $('.to-svg').each(function(index, el) {
        $.imgToSvg($(this));
    });
    $('.form__ajax').on('submit', function(event) {
        event.preventDefault();

        $.activeLoading();
        $form = $(this);

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            dataType: 'json',
            data: $form.serialize(),
        })
        .done(function(data) {
            $.showMessage(data.message);
            if(data.status){
                $form.find('input, textarea').val('');
            }
        })
        .fail(function() {
            $.showMessage('Fallo durante la conexión al servidor. Intente mas tarde');
        })
        .always(function() {
            $.deactiveLoading();
        });
        
    });
});

$.resizing = function(element){
    $(window).resize(function() {
        var width = element.outerWidth();
        element.css({
            "height": width * eval(element.attr('data-resizing'))
        });
        if(element.hasClass('panel')){
            element.parent().find('.panel').css({
                "height": width * eval(element.attr('data-resizing'))
            });
        }
    }).resize();
}

$.imgToSvg = function(image){
    var $img = image;
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function(data) {
        var $svg = jQuery(data).find('svg');
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        $svg = $svg.removeAttr('xmlns:a');
        $img.replaceWith($svg);

        if($img.hasClass('map-animate'))
            $.myScrollAnimate();
    }, 'xml');
}

$.runSlider = function($slider){
    $slider.fractionSlider({
        'controls': false,
        'pager': false
    });
}
    


$.activeLoading = function(){
    $('.modal__loading').addClass('active');
}
$.deactiveLoading = function(){
    $('.modal__loading').removeClass('active');
}
$.showMessage = function($message, $type){
    $type = $type || '';
    $box = $('.message__popup');

    $box.find('.message__text').text($message);
    $box.addClass('active');
    
    setTimeout(function(){
        $box.removeClass('active');
        setTimeout(function(){
            $box.find('.message__text').text('');
        }, 400)
    }, 8000);
}

/* ---- particles.js config ---- */

particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 100,
      "density": {
        "enable": true,
        "value_area":1000
      }
    },
    "color": {
      "value": ["#aa73ff", "#f8c210", "#83d238", "#33b1f8"]
    },
    
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#fff"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.6,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 120,
      "color": "#ffffff",
      "opacity": 1,
      "width": 3
    },
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": false
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});  
