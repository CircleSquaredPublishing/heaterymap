/*The main javascript file for the homepage.*/

/*Theme Selectors*/

$("#btn-belgium").click(function () {
$('head').append('<link href="/github/heaterymap/hm-assets/hm-css/hm_belgium.css" rel="stylesheet" id="hm_belgium" />');
});

$("#btn-redee").click(function () {
$('head').append('<link href="/github/heaterymap/hm-assets/hm-css/hm_blk_red.css" rel="stylesheet" id="hm_blk_red" />');
});

$("#btn-pink").click(function () {
$('head').append('<link href="/github/heaterymap/hm-assets/hm-css/hm_pink.css" rel="stylesheet" id="hm_pink" />');
});

$("#btn-roots").click(function () {
$('head').append('<link href="/github/heaterymap/hm-assets/hm-css/hm_roots.css" rel="stylesheet" id="hm_roots" />');
});


/*-------------------------------
Toggle Control for main side bar.
--------------------------------*/

$('#btn-sidebar-toggle span').parent().click(function () {

    if($('#btn-sidebar-toggle span').hasClass('glyphicon glyphicon-arrow-left')) {
            
        $('#btn-sidebar-toggle').html('<span class="glyphicon glyphicon-arrow-right"></span> Open'); 
            
    } else {   
    
        $('#btn-sidebar-toggle').html('<span class="glyphicon glyphicon-arrow-left"></span> Close'); 
    
    }
    
}); 


$("#btn-sidebar-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
});


/*--------------------------
Toggle Control for tooltips.
---------------------------*/
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});    


/*------------
Map functions
-------------*/
var map, pointArray, heatmap;

function displayMap(){
    
    var retro_style = new google.maps.StyledMapType(retroStyle,{name:"Retro"});
    var apple_style = new google.maps.StyledMapType(appleStyle,{name:"Apple"});
    var light_style = new google.maps.StyledMapType(lightStyle,{name:"Dusk"});
    var old_style = new google.maps.StyledMapType(oldStyle,{name:"Vintage"});
    var pale_style = new google.maps.StyledMapType(paleStyle,{name:"Cloud"});
    var brown_style = new google.maps.StyledMapType(brownStyle,{name:"Organic"});
    var center = new google.maps.LatLng(38,-90);
    var gradientNew=["rgba(0,255,255,0)","rgba(25,22,218,1)","rgba(17,191,225,1)","rgba(16,227,217,1)","rgba(15,229,173,1)","rgba(14,231,128,1)","rgba(13,233,82,1)","rgba(12,235,34,1)","rgba(37,237,11,1)","rgba(85,239,10,1)","rgba(134,241,8,1)","rgba(185,243,7,1)","rgba(237,245,6,1)","rgba(247,203,5,1)","rgba(249,152,3,1)","rgba(251,100,2,1)","rgba(255,127,131,1)","rgba(253,47,1,1)","rgba(255,0,7,1)"];
    
    var mapOptions = {
        zoom: 5,
        center: center,
        scrollwheel: false,
        streetViewControl: false,
        panControl: false,
        zoomControl: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP,
            style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeControl: true,
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.TOP_LEFT,
        mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic", 
             google.maps.MapTypeId.ROADMAP, 
             google.maps.MapTypeId.SATELLITE, 
             google.maps.MapTypeId.TERRAIN]
            }

        };
    
        /*Define the Map Variable.*/
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    
        var pointArray = new google.maps.MVCArray(heatmapLayer);
        heatmap = new google.maps.visualization.HeatmapLayer({
        data: pointArray,
        radius: 30,
        opacity: .3,
        gradient: gradientNew,
        map: map
        });
    
        map.mapTypes.set("Retro", retro_style);
        map.mapTypes.set("Apple", apple_style);
        map.mapTypes.set("Dusk", light_style);
        map.mapTypes.set("Vintage", old_style);
        map.mapTypes.set("Cloud", pale_style);
        map.mapTypes.set("Organic", brown_style);
        map.setMapTypeId("Organic");
    }   

google.maps.event.addDomListener(window, "load", displayMap);