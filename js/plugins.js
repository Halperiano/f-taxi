$(function() {
"use strict";

$("#main").css("min-height",$(window).height());
$('.sidebar-collapse').sideNav({edge: 'left'});
$('.menu-sidebar-collapse').sideNav({menuWidth: 240,edge: 'left',});
$('.dropdown-menu').dropdown({inDuration: 300,outDuration: 225,constrain_width: false, hover: true, gutter: 0, belowOrigin: true });

$('.slider').slider({full_width: true,interval:4000,Transition:10,Indicators:false});

$(window).load(function(){$("#loading_famicodes").hide();});

}); 