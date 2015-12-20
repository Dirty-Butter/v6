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
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/foundation.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.common.css" rel="stylesheet">
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.helpers.css" rel="stylesheet">
      {if !empty($SKIN_SUBSET)}
      <link href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.{$SKIN_SUBSET}.css" rel="stylesheet">
      {/if}
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
      {foreach from=$CSS key=css_keys item=css_files}
      <link rel="stylesheet" type="text/css" href="{$STORE_URL}/{$css_files}" media="screen">
      {/foreach}
      <meta http-equiv="Content-Type" content="text/html;charset={$CHARACTER_SET}">
      <meta name="description" content="{if isset($META_DESCRIPTION)}{$META_DESCRIPTION}{/if}">
      <meta name="keywords" content="{if isset($META_KEYWORDS)}{$META_KEYWORDS}{/if}">
      <meta name="robots" content="index, follow">
      <meta name="generator" content="cubecart">
      {if $FBOG}
      <meta property="og:image" content="{$PRODUCT.thumbnail}">
      <meta property="og:url" content="{$VAL_SELF}">
<meta property="og:type"               content="website"  />
<meta property="og:title"              content="{$META_TITLE}"  />
<meta property="og:description"        content="{$META_DESCRIPTION}"  />
<!--<meta property="og:image:url"              content="https://dirtybutter.com/plushcatalog/images/source/barn600x600.JPG"  /> -->
      {/if}
      {include file='templates/content.recaptcha.head.php'}
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/modernizr.min.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.js"></script>
      {include file='templates/element.google_analytics.php'}
      {foreach from=$HEAD_JS item=js}{$js}{/foreach}
   </head>
   <body>
            <div class="row marg-top">
               <div class="small-12 medium-7 large-6 columns">
                  <a href="{$STORE_URL}" class="main-logo"><img src="{$STORE_LOGO}" alt="{$CONFIG.store_name}"></a>
               </div>
<div class="medium-5 large-6 columns">
                  <div class="row show-for-medium-up">
                     <div class="medium-10 large-10  columns">{include file='templates/box.search.php'}</div>
                  </div>
               </div>
            </div>
<div class="show-for-small-only"> {* SMALL ONLY *}
 <br>
			<div class="row " id="small-search"> 
					<div class="small-12 columns small-collapse">
				{include file='templates/box.search.php'}
					</div>
			</div> 
               <div class="row">
					<div class="small-12 columns small-collapse">
					<strong>
					{if isset($SITE_DOCS_HEADER)}{include file='templates/box.documents_header.php'}{/if}
					</strong>
					</div>
			</div>
			<div class="row">
					<div class="small-12 columns small-collapse">
					<br>
					{include file='templates/box.navigation.php'}
                  </div>
          </div>
</div>    {* END SMALL ONLY *}  
<div class="row show-for-medium-up">
					<strong>
					{if isset($SITE_DOCS_HEADER)}{include file='templates/box.documents_header.php'}{/if}
					</strong>
               </div>
            </div>
            <div class="row {$SECTION_NAME}_wrapper">
               <div class="small-12 large-12 columns small-collapse">
               	{include file='templates/box.progress.php'}
               </div>
               <div class="small-12 large-12 columns">
                  {include file='templates/box.errors.php'}
                  {$PAGE_CONTENT}
               </div>
            </div>
            <footer>
               <div class="row">
			<div class="row">
                  <div class="medium-7 large-7 columns">
                     {include file='templates/box.documents_footer.php'}
 											{* Comodo SSL badge *}
											<img src="https://dirtybutter.com/plushcatalog/images/source/comodossl.png" alt="SSL Certificate" title="SSL Certificate" width="60" /></a>					
											{* end SSL badge *}
											&nbsp; &nbsp;
											{* Sitelock Badge *}
											<a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=dirtybutter.com','SiteLock');" ><img alt="website security" title="SiteLock"  src="//shield.sitelock.com/shield/dirtybutter.com"  width="75"/></a>
											{* end SiteLock Badge *}
                  </div>
                  <div class="medium-5 large-5 columns">
                 
{include file='templates/widgets/social.php'}
                     
                        </div>
                     </div>
<div class= "large-12 columns row collapse">                       
                           {include file='templates/box.newsletter.php'}
                  </div>
 <div class="large-12 columns">
 {$COPYRIGHT}
{include file='templates/ccpower.php'}

               </div>
            </footer>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.rating.min.js" type="text/javascript"></script>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.validate.min.js" type="text/javascript"></script>
            <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.cookie.min.js" type="text/javascript"></script>
            {foreach from=$BODY_JS item=js}{$js}{/foreach}
            {foreach from=$JS_SCRIPTS key=k item=script}
            <script src="{$STORE_URL}/{$script|replace:'\\':'/'}" type="text/javascript"></script>
            {/foreach}
            <script>
               $(document).foundation();
            </script>
            {$LIVE_HELP}
            {$DEBUG_INFO}
            {$SKIN_SELECT}
   </body>
</html>