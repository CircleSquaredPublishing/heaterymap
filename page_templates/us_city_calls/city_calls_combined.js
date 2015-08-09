/*Variables for controlling display of all maps*/
var opacity = 0.5; /*Default is 0.3*/
var radius = 5; /*Default is 5*/

$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=38.8282, -95.5795&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=26.461635, -80.071123&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=40.7127,-74.0059&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=33.7550,-84.3900&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=29.9500,-90.0667&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=42.3314,83.0458&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=39.7392,-104.9903&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=42.3601,-71.0589&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=41.8369,-87.6847&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=47.6097,-122.3331&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=37.7833,-122.4167&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=32.7767,-96.7970&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=34.052234,-118.243685&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=40.760779,-111.891047&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=35.779590,-78.638179&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=31.777576,-106.442456&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=36.169941,-115.139830&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=45.523062,-122.676482&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=46.808327,-100.783739&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=33.448377,-112.074037&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=44.977753,-93.265011&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=36.162664,-86.781602&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=36.153982,-95.992775&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=41.600545,-93.609106&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=45.676998,-111.042934&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=43.618710,-116.214607&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=39.103118,-84.512020&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});
$(document).ready(function () {

    $.ajax({


        url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=38.040584,-84.503716&distance=500000&fields=talking_about_count,location&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",

        dataType: "text",

        success: function (data) {

            var restaurantData = $.parseJSON(data);
            var myData = [];
            var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"];

            for (var i = 0; i < restaurantData.data.length; i++) {

                var lat = restaurantData.data[i].location.latitude;
                var lng = restaurantData.data[i].location.longitude;
                var wgt = restaurantData.data[i].talking_about_count;
                var latLng = new google.maps.LatLng(lat, lng, wgt);

                myData.push(latLng);

            }

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: myData,
                radius: radius,
                opacity: opacity,
                gradient: gradientNew,
                map: map

            });
        }
    });
});