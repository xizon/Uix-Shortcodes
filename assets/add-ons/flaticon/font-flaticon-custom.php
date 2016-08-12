<?php
/**
 * Custom Icons and List Shortcodes
 * Plugin URI: https://uiux.cc/wp-plugins/uix-shortcodes/
 * Author: UIUX Lab
 * Author URI: https://uiux.cc
 * License: GPLv2 or later

 */
 
 

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../sweetalert/sweetalert.css?ver=1.0.0" type="text/css" media="screen" />
<link rel="stylesheet" href="flaticon.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" href="../fontawesome/font-awesome.css?ver=4.4.0" type="text/css" media="screen" />
<link rel="stylesheet" href="../rollbar/jquery.rollbar.css" type="text/css" media="screen" />

<style>
html,body{
	margin:0;
	padding:0;
	color:#666;
}

</style>
</head>

<body ondragstart="window.event.returnValue=false" oncontextmenu="window.event.returnValue=false" onselectstart="event.returnValue=false">

<?php
$pushinputID = '';
$position = '';
$type = '';

if ( isset( $_GET['pushinputID'] ) ) $pushinputID = $_GET['pushinputID'];
if ( isset( $_GET['p'] ) ) $position = $_GET['p'];
if ( isset( $_GET['type'] ) ) $type = $_GET['type'];

$social_icons = '
<a href="javascript:" class="b fontawesome"><i class="fa fa-twitter"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-twitter-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-facebook"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-facebook-official"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-facebook-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-flickr"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-git"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-git-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-github"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-github-alt"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-github-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-gittip"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-google"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-google-plus"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-google-plus-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-linkedin"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-linkedin-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pinterest"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pinterest-p"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pinterest-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-deviantart"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-digg"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-dribbble"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-instagram"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-behance"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-behance-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-vimeo"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-vimeo-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-youtube"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-youtube-play"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-youtube-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-reddit"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-reddit-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-codepen"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-qq"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-skype"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-tumblr"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-tumblr-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-wechat"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-weibo"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-weixin"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-renren"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-adn"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-android"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-angellist"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-apple"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-bitbucket"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-bitbucket-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-bitcoin"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-btc"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-buysellads"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-twitch"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-connectdevelop"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-css3"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-dashcube"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-delicious"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-dropbox"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-drupal"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-empire"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-forumbee"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-foursquare"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-ge"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-gratipay"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-hacker-news"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-html5"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-ioxhost"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-joomla"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-jsfiddle"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-lastfm"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-lastfm-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-leanpub"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-linux"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-maxcdn"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-meanpath"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-medium"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-openid"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pagelines"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-paypal"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pied-piper"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-pied-piper-alt"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-ra"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-rebel"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-sellsy"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-share-alt"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-share-alt-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-shirtsinbulk"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-simplybuilt"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-skyatlas"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-slack"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-slideshare"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-soundcloud"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-spotify"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-stack-exchange"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-stack-overflow"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-steam"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-steam-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-stumbleupon"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-stumbleupon-circle"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-tencent-weibo"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-trello"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-viacoin"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-vine"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-vk"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-whatsapp"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-windows"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-wordpress"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-xing"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-xing-square"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-yahoo"></i></a>
<a href="javascript:" class="b fontawesome"><i class="fa fa-yelp"></i></a>
	';


$icons_show = '
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-add"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-add-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-add-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-add-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-agenda"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-alarm"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-alarm-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-alarm-clock"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-alarm-clock-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-albums"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-app"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-archive"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-archive-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-archive-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-archive-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-attachment"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-back"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-battery-9"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-binoculars"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-blueprint"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-bluetooth"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-bluetooth-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-bookmark"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-bookmark-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-briefcase"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-broken-link"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calculator"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calculator-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-calendar-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-checked"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-checked-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-clock"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-clock-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-close"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-cloud-computing-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-command"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-compact-disc"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-compact-disc-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-compact-disc-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-compass"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-compose"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-controls-9"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-database"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-database-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-database-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-database-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-diamond"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-diploma"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-dislike"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-dislike-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-divide"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-divide-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-division"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-document"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-download"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-edit"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-edit-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-eject"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-eject-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-equal"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-equal-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-equal-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-error"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-exit"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-exit-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-exit-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-eyeglasses"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-fast-forward"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-fast-forward-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-fax"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-file"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-file-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-file-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-film"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-fingerprint"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-flag"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-flag-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-flag-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-flag-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-flag-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-focus"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-10"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-11"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-12"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-13"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-14"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-15"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-16"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-17"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-18"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-19"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-folder-9"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-forbidden"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-funnel"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-garbage"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-garbage-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-garbage-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-gift"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-help"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hide"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hold"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-home"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-home-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-home-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hourglass"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hourglass-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hourglass-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-hourglass-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-house"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-id-card-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-idea"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-incoming"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-infinity"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-info"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-internet"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-key"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-lamp"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-layers"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-layers-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-like"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-like-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-like-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-link"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-list"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-list-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-lock"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-lock-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-locked-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-login"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-magic-wand"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-magnet"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-magnet-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-magnet-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-map"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-map-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-map-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-map-location"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-megaphone"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-megaphone-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-menu"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-menu-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-menu-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-menu-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-menu-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-microphone"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-microphone-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-minus"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-minus-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-more"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-more-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-more-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-multiply"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-multiply-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-music-player"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-music-player-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-music-player-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-music-player-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-mute"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-muted"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-navigation"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-navigation-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-network"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-newspaper"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-next"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-note"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notebook-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notepad"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notepad-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notepad-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-notification"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-paper-plane"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-paper-plane-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-pause"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-pause-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-percent"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-percent-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-perspective"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-photo-camera"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-photo-camera-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-photos"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-picture"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-picture-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-picture-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-pin"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-placeholder"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-placeholder-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-placeholder-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-placeholder-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-placeholders"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-play-button"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-play-button-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-plus"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-power"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-previous"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-price-tag"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-print"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-push-pin"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-radar"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-reading"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-record"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-repeat"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-repeat-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-restart"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-resume"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-rewind"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-rewind-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-route"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-save"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-search"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-search-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-send"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-server"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-server-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-server-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-server-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-settings-9"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-share"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-share-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-share-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-shuffle"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-shuffle-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-shutdown"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-sign"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-sign-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-skip"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-10"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-11"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-smartphone-9"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-speaker-8"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-spotlight"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-star"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-star-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stop"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stop-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stopwatch"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stopwatch-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stopwatch-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stopwatch-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-stopwatch-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-street"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-street-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-substract"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-substract-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-success"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-switch-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-tabs"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-tabs-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-target"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-television"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-television-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-time"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-trash"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-umbrella"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-unlink"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-unlocked"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-unlocked-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-unlocked-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-upload"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-5"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-6"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-user-7"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-users"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-users-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-video-camera"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-video-camera-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-video-player"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-video-player-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-video-player-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-view"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-view-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-view-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-volume-control"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-volume-control-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-warning"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-wifi"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-wifi-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-windows"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-windows-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-windows-2"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-windows-3"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-windows-4"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-wireless-internet"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-worldwide"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-worldwide-1"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-zoom-in"></i></a>
<a href="javascript:" class="b flaticon"><i class="flaticon flaticon-zoom-out"></i></a>


<strong>Social:</strong>
'.$social_icons.'
';


//Social

if ($type == 'social'){
	$icons_show = $social_icons;
}

$container_s = '';

if ($type == 'social') $container_s = '-s';

if ($position == 1 || $type == 'social'){
	echo '
	<div class="sweet-icon-selector-container'.$container_s.'">
		<div class="sweet-icon-selector" id="sweet-icon-scroller">
			'.$icons_show.'
		</div>

	</div>

	';
}else{
	echo '
    <div class="sweet-icon-selector" id="sweet-icon-scroller">
        '.$icons_show.'
    </div>

	';
}

?>


<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery.migrate.min.js"></script>
<script src="../../js/jquery.mousewheel.js"></script>
<script src="../rollbar/jquery.rollbar.min.js"></script>

<script type="text/javascript">

( function($) {
    

	$( document ).ready( function() {

		//scroller
		$("#sweet-icon-scroller").rollbar({
			scroll: 'vertical',
			zIndex:80,
			pathPadding: '0'
		}); 
		
		//Icon type
		$(".b.fontawesome").click(function(){
			var _v = $(this).find(".fa").attr("class");
			$(".b.fontawesome").removeClass('active');
			$(this).addClass('active');
			
			
			_v = _v.replace('fa fa-','');
			$("#<?php echo $pushinputID;?>",window.parent.document).val(_v);
			$("#<?php echo $pushinputID;?>-preview",window.parent.document).html('<i class="fa fa-'+_v+'"></i>');
			
		});
		
		$(".b.flaticon").click(function(){
			var _v = $(this).find(".flaticon").attr("class");
			$(".b.flaticon").removeClass('active');
			$(this).addClass('active');
			
			
			_v = _v.replace('flaticon ','');
			$("#<?php echo $pushinputID;?>",window.parent.document).val(_v);
			$("#<?php echo $pushinputID;?>-preview",window.parent.document).html('<i class="flaticon '+_v+'"></i>');
	
			
		});	
		

	} ); 

	
	
} ) ( jQuery );



</script>

</body>
</html>
