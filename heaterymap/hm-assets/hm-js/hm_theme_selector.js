$("#btn-remove-theme").click(function () {
$('link[rel=stylesheet]').remove();
});

$("#btn-belgium").click(function () {
$('head').append('<link href="/heaterymap/hm-assets/hm-css/hm_belgium.css" rel="stylesheet" id="hm_belgium" />');
});

$("#btn-redee").click(function () {
$('head').append('<link href="/heaterymap/hm-assets/hm-css/hm_blk_red.css" rel="stylesheet" id="hm_blk_red" />');
});

$("#btn-pink").click(function () {
$('head').append('<link href="/heaterymap/hm-assets/hm-css/hm_pink.css" rel="stylesheet" id="hm_pink" />');
});

$("#btn-roots").click(function () {
$('head').append('<link href="/heaterymap/hm-assets/hm-css/hm_roots.css" rel="stylesheet" id="hm_roots" />');
});