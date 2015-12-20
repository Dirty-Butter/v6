{* PLUSH
 * CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2015. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
 *}
<!DOCTYPE html>
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" dir="{$TEXT_DIRECTION}" lang="{$HTML_LANG}">
   <head>
      <title>{$META_TITLE}</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="{$CANONICAL}" rel="canonical">
      <link href="{$STORE_URL}/favicon.ico" rel="shortcut icon" type="image/x-icon">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/normalize.css" rel="stylesheet">
	  <link rel="stylesheet" href="{$STORE_URL}/content-slider/css/content-slider.css" type="text/css" />
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/foundation.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.common.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.helpers.css" rel="stylesheet">
      {if !empty($SKIN_SUBSET)}
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.{$SKIN_SUBSET}.css" rel="stylesheet">
      {/if}
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/jquery.bxslider.css" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type='text/css'>
      {foreach from=$CSS key=css_keys item=css_files}
      <link href="{$STORE_URL}/{$css_files}" rel="stylesheet" type="text/css" media="screen">
      {/foreach}
      <meta http-equiv="Content-Type" content="text/html;charset={$CHARACTER_SET}">
      <meta name="description" content="{if isset($META_DESCRIPTION)}{$META_DESCRIPTION}{/if}">
      <meta name="keywords" content="{if isset($META_KEYWORDS)}{$META_KEYWORDS}{/if}">
      <meta name="robots" content="index, follow">
      <meta name="generator" content="cubecart">
      {if $FBOG}
     <meta property="og:image" content="{$image.source}">
      <meta property="og:url" content="{$VAL_SELF}">
   <!--  <meta property="og:image" content="https://dirtybutter.com/plushcatalog/images/source/barn600x600.JPG"> -->
      {/if}
      {include file='templates/content.recaptcha.head.php'}
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/modernizr.min.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.js"></script>
      {include file='templates/element.google_analytics.php'}
      {foreach from=$HEAD_JS item=js}{$js}{/foreach}
   </head>
   <body>
   	  {if $STORE_OFFLINE}
   	  <div data-alert class="alert-box alert">{$LANG.common.warning_offline}<a href="#" class="close">&times;</a></div>
   	  {/if}
      <div class="off-canvas-wrap" data-offcanvas>
         <div class="inner-wrap">
            {include file='templates/box.off_canvas.right.php'}
            {include file='templates/box.off_canvas.left.php'}
											{* Comodo SSL badge *}
											<img src="https://dirtybutter.com/plushcatalog/images/source/comodossl.png" alt="SSL Certificate" title="SSL Certificate" width="60" />					
											{* end SSL badge *}
											{* Sitelock Badge *}
											<a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=dirtybutter.com','SiteLock');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/dirtybutter.com"  width="75"/></a>
											{* end SiteLock Badge *}
            {include file='templates/box.eu_cookie.php'}
            <div class="row marg-top" id="top_header">
	<div class="small-12 medium-4 large-6 columns">
                  <a href="{$STORE_URL}" class="main-logo"><img src="{$STORE_LOGO}" alt="{$CONFIG.store_name}"></a>
               </div>
<div class="small-12 medium-8 large-6 columns nav-boxes"> {* DIV CLASS  NAV BOXES *}
                  <div class="row" id="nav-actions"> {* ROW 1 SMALL *}
<div class="show-for-small-only text-center">
  <a href="#" class="left-off-canvas-toggle button white tiny"><i class="fa fa-bars fa-2x"></i></a>
  <a href="#" class="button white tiny show-small-search"><i class="fa fa-search fa-2x"></i></a>
  <a href="#" class="right-off-canvas-toggle button white "><i class="fa fa-shopping-cart fa-2x"></i></a>
  <div id="smallt-basket-detail" class="hide panel radius small-basket-detail-container js_fadeOut"><i class="fa fa-check"></i> Added to Basket</div>
</div>
<div class="right text show-for-medium-up">{include file='templates/box.basket.php'}</div>
		 {include file='templates/box.currency.php'}
		 {include file='templates/box.language.php'}
		 {include file='templates/box.session.php'}
</div> {* END ROW 1 SMALL *}
<div class="row hide" id="small-search"> {* HIDDEN SEARCH BOX THAT SHOWS AFTER ICON CLICKED ON SMALL  *}
			<div class="medium-5 columns">
{include file='templates/box.search.php'}</div>
</div> {* END HIDDEN SEARCH *} 
												
													{* REST OF ROW 1 MEDIUM UP *}
 <div class="row show-for-medium-up">
 <div class="small-12 columns">{include file='templates/box.search.php'}</div>

</div>{* END ROW 1 MEDIUM UP *}
</div>  {* DIV CLASS  NAV BOXES *}   

{if isset($SFWS_CONTENT_SLIDER)}{$SFWS_CONTENT_SLIDER}{/if}

            <div class="row"> {* ROW 2 *}
               <div class="small-12 columns small-collapse">
<br>
<strong>
<p style="text-align: center;">
	<span style="font-size:26px;"><span style="color: rgb(189, 0, 0);"><strong>HUGE SALE IN PROGRESS!!</strong></span></span></p>
	{if isset($SITE_DOCS)}{include file='templates/box.documents.php'}{/if}
{if isset($SITE_DOCS_HEADER)}{include file='templates/box.documents_header.php'}{/if}
</strong>
               </div>
												{* END ROW 2 *}



            <div class="row hide-for-medium-up">
               <div class="small-12 columns small-collapse">
<br>
                  {include file='templates/box.navigation.php'}
               </div>
            </div>
			
            <div class="row"> {* ROW 3 *}
               <div class="small-12 columns small-collapse">
                  {include file='templates/element.breadcrumb.php'} 
               </div>


</div>{* END DIV CLASS MARG-TOP *}
            <div class="row {$SECTION_NAME}_wrapper">
              <div class="medium-4 large-3 columns show-for-medium-up">
				{* {include file='templates/widgets/easter.php'} *}
				{*  {include file='templates/widgets/healthrelated.php'}  *}
				{*  {include file='templates/widgets/birthday.php'}  *}
{include file='templates/widgets/featuredbrand.php'}
			   
				{$SFWS_VERTICAL_NAVIGATION_BOX_CBD}
			    {if isset($SITE_DOCS_SIDEBOX1)}{include file='templates/box.documents_sidebox1.php'}{/if}
                 {* {include file='templates/box.featured.php'} *}
               {*  {include file='templates/box.sale_items.php'} *}
				{if isset($SITE_DOCS_SIDEBOX2)}{include file='templates/box.documents_sidebox2.php'}{/if}
               </div>
               <div class="small-12 medium-7 large-9 columns small-collapse" id="main_content">
                  {include file='templates/box.errors.php'}
                  {include file='templates/box.progress.php'}
                  {$PAGE_CONTENT}
               </div>
             
               <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i> {$LANG.common.top}</a>
            </div>
 <div class= "large-12 columns row collapse">
{if isset($RANDOM_SITE_TESTIMONIAL)}{include file='templates/box.testimonial.php'}{/if}
</div>
 <div class= "large-12 columns row collapse">
 <div class="row">
               <div class="row">
                  <div class="medium-7 large-7 columns">
                     {if isset($SITE_DOCS)}{include file='templates/box.documents.php'}{/if}
					 {if isset($SITE_DOCS_FOOTER)}{include file='templates/box.documents_footer.php'}{/if}	
<!-- PayPal Logo --><img src="https://dirtybutter.com/plushcatalog/images/source/paypal.jpg" border="0" alt="PayPal Acceptance Mark"></a><!-- PayPal Logo -->																			
                  </div>
				<div class="medium-5 large-5 columns">                       
                                     
						{include file='templates/widgets/social.php'}
                     </div>
				</div>
<footer>
                
 <div class="large-12 columns">
  {include file='templates/box.newsletter.php'} 
{include file='templates/ccpower.php'}
               </div>
</footer>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.rating.min.js" type="text/javascript"></script>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.validate.min.js" type="text/javascript"></script>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.cookie.min.js" type="text/javascript"></script>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.bxslider.min.js" type="text/javascript"></script>
            {foreach from=$BODY_JS item=js}{$js}{/foreach}
            {foreach from=$JS_SCRIPTS key=k item=script}
            <script src="{$STORE_URL}/{$script|replace:'\\':'/'}" type="text/javascript"></script>
            {/foreach}
            <script>
               {literal}
               $(document).foundation({equalizer:{equalize_on_stack:true}});
               $('.bxslider').bxSlider({auto:true,captions:true});
               {/literal}
            </script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-524305117d3cbe99" async="async"></script>

           {$LIVE_HELP}
            {$DEBUG_INFO}
            {include file='templates/box.skins.php'}
            <a class="exit-off-canvas"></a>
           </div>
      </div>
</div>
</div>
</div>
</div>
   </body>
</html>