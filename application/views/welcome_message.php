<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title></title>

	<style type="text/css">
            body{
                background: url("/public/imgs/bg_top.jpg") 50% 0px / cover no-repeat;
                background-color: rgb(241, 241, 230);
            }
            
	</style>
        <link href="/public/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/public/css/template.css" rel="stylesheet" type="text/css"/>
        <link href="/public/css/navbar.css" rel="stylesheet" type="text/css"/>
        <script src="/public/js/jquery.js" type="text/javascript"></script>
        <script src="/public/js/camera.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="header">
        <div class="row-container visible-first visible">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div id="logo" class="span12">
                        <a href="http://livedemo00.template-help.com/joomla_55203/">
                            <img src="/public/imgs/logo.png" alt="Perfect Rent">
                            <h1 class="visible-first visible"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Perfect</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last item_title_part_second">Rent</span></h1>
                        </a>
                    </div>
                    <div class="moduletable slogan  span12">
                        <div class="module_container">
                            <div class="mod-article-single mod-article-single__slogan" id="module_145">
                                <div class="item__module visible-first visible" id="item_99">
                                    <div class="item_introtext">
                                        <p>royal apartments for you</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="navigation" role="navigation">
<div class="row-container visible-first visible">
<div class="container-fluid">
<div class="row-fluid">
<nav class="moduletable   span12"><div class="module_container">
<div class="icemegamenu">
<ul id="icemegamenu">
<li id="iceMenu_134" class="iceMenuLiLevel_1 mzr-drop parent current active  firstItem" data-hover="false">
<a href="http://livedemo00.template-help.com/joomla_55203/" class="icemega_active iceMenuTitle">
<span class="icemega_title icemega_nosubtitle">Main</span>
</a>
<ul class="icesubMenu icemodules sub_level_1" style="width:180px">
<li class="lastItem firstItem">
<div style="float:left;width:180px" class="iceCols">
<ul>
<li id="iceMenu_135" class="iceMenuLiLevel_2  firstItem">
<a href="/joomla_55203/index.php/about/history" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">History</span>
</a>
</li>
<li id="iceMenu_136" class="iceMenuLiLevel_2 mzr-drop parent">
<a href="/joomla_55203/index.php/about/team" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">Team</span>
</a>
<ul class="icesubMenu icemodules sub_level_2" style="width:180px">
<li class="lastItem firstItem">
<div style="float:left;width:180px" class="iceCols">
<ul>
<li id="iceMenu_137" class="iceMenuLiLevel_3  lastItem firstItem">
<a href="/joomla_55203/index.php/about/team/testimonials" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">Testimonials</span>
</a>
</li>
</ul>
</div>
</li>
</ul>
</li>
<li id="iceMenu_138" class="iceMenuLiLevel_2 ">
<a href="/joomla_55203/index.php/about/faqs" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">FAQs</span>
</a>
</li>
<li id="iceMenu_171" class="iceMenuLiLevel_2 ">
<a href="/joomla_55203/index.php/template-settings" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">Template settings</span>
</a>
</li>
<li id="iceMenu_133" class="iceMenuLiLevel_2  lastItem">
<a href="/joomla_55203/index.php/forum" class=" iceMenuTitle ">
<span class="icemega_title icemega_nosubtitle">Forum</span>
</a>
</li>
</ul>
</div>
</li>
</ul>
</li>
<li id="iceMenu_203" class="iceMenuLiLevel_1 fullwidth">
<a href="/joomla_55203/index.php/gallery" class="iceMenuTitle">
<span class="icemega_title icemega_nosubtitle">Apartments</span>
</a>
</li>
<li id="iceMenu_139" class="iceMenuLiLevel_1 ">
<a href="/joomla_55203/index.php/services" class="iceMenuTitle">
<span class="icemega_title icemega_nosubtitle">Services</span>
</a>
</li>
<li id="iceMenu_141" class="iceMenuLiLevel_1 ">
<a href="/joomla_55203/index.php/blog" class="iceMenuTitle">
<span class="icemega_title icemega_nosubtitle">Blog</span>
</a>
</li>
<li id="iceMenu_142" class="iceMenuLiLevel_1  lastItem">
<a href="/joomla_55203/index.php/contacts" class="iceMenuTitle">
<span class="icemega_title icemega_nosubtitle">Contacts</span>
</a>
</li>
</ul>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var browser_width1 = jQuery(window).width();
		jQuery("#icemegamenu").find(".icesubMenu").each(function(index){
			var offset1 = jQuery(this).offset();
			var xwidth1 = offset1.left + jQuery(this).width();
			if(xwidth1 >= browser_width1){
				jQuery(this).addClass("ice_righttoleft");
			}
		});
		
	})
	jQuery(window).resize(function() {
		var browser_width = jQuery(window).width();
		jQuery("#icemegamenu").find(".icesubMenu").removeClass("ice_righttoleft").each(function(index){
			var offset = jQuery(this).offset();
			var xwidth = offset.left + jQuery(this).width();
			if(xwidth >= browser_width){
				jQuery(this).addClass("ice_righttoleft");
			}
		});
	});
</script></div></nav>
</div>
</div>
</div>
</div>
    
<div id="showcase">
    <div class="row-container visible-first visible">
        <div class="container-fluid">
            <img src="/public/imgs/slide-1.jpg" style="width:100%" alt=""/>
        </div>
    </div>
</div>
    
<div id="maintop">
    <div class="row-container visible-first visible">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="moduletable finder  span12">
                    <div class="module_container">
                        <?=$content->content?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>