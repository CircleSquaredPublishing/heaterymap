/*----------------------------------------------------------------------------------------
*This is the TEMPLATE-heatmap main javascript file. This files contains the functions that *control the toolbar buttons and the jQuery AJAX functions that calls the Facebook Graph API. *In order to use the AJAX call you will need an App access token from Facebook. Follow this *link for more info on creating a web app https://developers.facebook.com/quickstarts/?*platform=web.
*Except as otherwise noted, the content of this page is licensed under the Creative Commons *Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
*Author: Circle Squared Data Labs
*Helpful Resources: https://developers.google.com/maps/documentation/javascript/heatmaplayer
*http://stackoverflow.com/questions/23899543/how-do-i-use-jquery-to-iterate-through-nested-json-in-a-single-pass
----------------------------------------------------------------------------------------*/


/*----------------------------
Google Analytics Tracking Code
------------------------------*/
var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-64702784-1']);
        _gaq.push(['_setDomainName', 'heatery.io']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();


/*------------------------------------------------
 * Contact Buttons Plugin Demo 0.1.0
 * https://github.com/joege/contact-buttons-plugin
 *
 * Copyright 2015, José Gonçalves
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 -------------------------------------------------*/

(function ($) {
  'use strict';

  // Main function
  $.contactButtons = function( options ){
    
    // Define the defaults
    var defaults = { 
      effect  : '', // slide-on-scroll
      buttons : {
        'facebook':   { class: 'facebook',  use: false, icon: 'facebook',    link: '', title: 'Follow on Facebook' },
        'google':     { class: 'gplus',     use: false, icon: 'google-plus', link: '', title: 'Visit on Google Plus' },
        'linkedin':   { class: 'linkedin',  use: false, icon: 'linkedin',    link: '', title: 'Visit on LinkedIn' },
        'twitter':    { class: 'twitter',   use: false, icon: 'twitter',     link: '', title: 'Follow on Twitter' },
        'pinterest':  { class: 'pinterest', use: false, icon: 'pinterest',   link: '', title: 'Follow on Pinterest' },
        'phone':      { class: 'phone',     use: false, icon: 'phone',       link: '', title: 'Call us', type: 'phone' },
        'email':      { class: 'email',     use: false, icon: 'envelope',    link: '', title: 'Send us an email', type: 'email' }
      }
    };

    // Merge defaults and options
    var s,
        settings = options;
    for (s in defaults.buttons) {
      if (options.buttons[s]) {
        settings.buttons[s] = $.extend( defaults.buttons[s], options.buttons[s] );
      }
    }
    
    // Define the container for the buttons
    var oContainer = $("#contact-buttons-bar");

    // Check if the container is already on the page
    if ( oContainer.length === 0 ) {
      
      // Insert the container element
      $('body').append('<div id="contact-buttons-bar">');
      
      // Get the just inserted element
      oContainer = $("#contact-buttons-bar");
      
      // Add class for effect
      oContainer.addClass(settings.effect);
      
      // Add show/hide button
      var sShowHideBtn = '<button class="contact-button-link show-hide-contact-bar"><span class="fa fa-angle-left"></span></button>';
      oContainer.append(sShowHideBtn);
      
      var i;
      for ( i in settings.buttons ) {
        var bs = settings.buttons[i],
            sLink = bs.link,
            active = bs.use;
        
        // Check if element is active
        if (active) {
          
          // Change the link for phone and email when needed
          if (bs.type === 'phone') {
            sLink = 'tel:' + bs.link;
          } else if (bs.type === 'email') {
            sLink = 'mailto:' + bs.link;
          }
          
          // Insert the links
          var sIcon = '<span class="fa fa-' + bs.icon + '"></span>',
              sButton = '<a href="' + sLink + 
                          '" class="contact-button-link cb-ancor ' + bs.class + '" ' + 
                          (bs.title ? 'title="' + bs.title + '"' : '') + 
                          (bs.extras ? bs.extras : '') + 
                          '>' + sIcon + '</a>';
          oContainer.append(sButton);
        }
      }
      
      // Make the buttons visible
      setTimeout(function(){
        oContainer.animate({ left : 0 });
      }, 200);
      
      // Show/hide buttons
      $('body').on('click', '.show-hide-contact-bar', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $('.show-hide-contact-bar').find('.fa').toggleClass('fa-angle-right fa-angle-left');
        oContainer.find('.cb-ancor').toggleClass('cb-hidden');
      });
    }
  };
  
  // Slide on scroll effect
  $(function(){
    
    // Define element to slide
    var el = $("#contact-buttons-bar.slide-on-scroll");
    
    // Load top default
    el.attr('data-top', el.css('top'));
    
    // Listen to scroll
    $(window).scroll(function() {
      clearTimeout( $.data( this, "scrollCheck" ) );
      $.data( this, "scrollCheck", setTimeout(function() {
        var nTop = $(window).scrollTop() + parseInt(el.attr('data-top'));
        el.animate({
          top : nTop
        }, 500);
      }, 250) );
    });
  });
  
 }( jQuery ));

// Google Fonts
WebFontConfig = {
  google: { families: [ 'Lato:400,700,300:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

// Initialize Share-Buttons
$.contactButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook':   { class: 'facebook', use: true, link: 'https://www.facebook.com/heateryApp', extras: 'target="_blank"' },
    'twitter':    { class: 'twitter',   use: true, icon: 'twitter',     link: 'https://twitter.com/DelrayInfo', title: 'Follow on Twitter' },
      'pinterest':  { class: 'pinterest', use: true, icon: 'pinterest',   link: 'https://www.pinterest.com/heateryio/', title: 'Follow on Pinterest' },
    'mybutton':   { class: 'git',      use: true, link: 'https://github.com/Weer', icon: 'github', title: 'Fork Us On Github' },
    'phone':      { class: 'phone_separated',    use: true, link: '+561 570-6066' },
    'email':      { class: 'email',    use: true, link: 'info@heatery.io' } 
  }
});

var map;

function initialize() {
var mapOptions = {
zoom: 13,
center: new google.maps.LatLng(26.461635, -80.071123),
panControl: false,
zoomControl: true,
    zoomControlOptions:{
        position: google.maps.ControlPosition.TOP_LEFT,
        style: google.maps.ZoomControlStyle.SMALL
    },
mapTypeId: google.maps.MapTypeId.SATELLITE
};
map = new google.maps.Map(document.getElementById('map-canvas'),
mapOptions);
};


/*----------------------- 
Heatmap Control Functions
-------------------------*/
function toggleHeatmap() {
    
heatmap.setMap(heatmap.getMap() ? null : map);
    
}

function changeRadius() {
    
heatmap.set('radius', heatmap.get('radius') ? null : 40);
    
}

function changeOpacity() {
    
heatmap.set('opacity', heatmap.get('opacity') ? null : 0.6);
    
}

google.maps.event.addDomListener(window, 'load', initialize);


/*---------------------------------------------------- 
jQuery AJAX function that calls the Facebook Graph API
------------------------------------------------------*/

$(document).ready(function() {

    $.ajax({

    url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=26.461635, -80.071123&distance=8000&fields=talking_about_count,location,name&offset=0&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

    dataType: "text",

    success: function(data) {

    var restaurantData = $.parseJSON(data);
        
/* Variable the stores heatmap layer data */
    var myData = [];
        
/*-----------------------
Custom Heatmap Signatures
-------------------------*/
        
    var gradientNew = ["rgba(0,255,255,0)",
        "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"
    ];

/*-------------------------------------------------
Loop through the results returning the needed data.
---------------------------------------------------*/
        
    for (var i = 0; i < restaurantData.data.length; i++) {

        var lat = restaurantData.data[i].location.latitude;

        var lng = restaurantData.data[i].location.longitude;

        var wgt = restaurantData.data[i].talking_about_count;

        var name = restaurantData.data[i].name;

        var address = restaurantData.data[i].location.street;

        var latLng = new google.maps.LatLng(lat, lng, wgt);

        myData.push(latLng);

    }
        
/*------------------------------------------ 
Set the heatmap layer and define properties.
--------------------------------------------*/
        
        heatmap = new google.maps.visualization.HeatmapLayer({

            data: myData,

            radius: 20,

            opacity: 0.4,

            gradient: gradientNew,

            map: map

            });
        }
    });
});