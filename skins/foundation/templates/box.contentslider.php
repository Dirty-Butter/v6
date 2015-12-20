{if ($CONTENT_SLIDER_STATUS && $CONTENT_SLIDER_DISPLAY_LOCATION == 'global') || ($CONTENT_SLIDER_STATUS && $CONTENT_SLIDER_DISPLAY_LOCATION == 'home' && $SECTION_NAME == 'home')}

	{if $SLIDES}
	<div class="row">
	<div class="small-12 large-12 columns small-collapse">

		{* <link rel="stylesheet" href="{$STORE_URL}/content-slider/css/content-slider.css" type="text/css" /> *}
		<script src="{$STORE_URL}/content-slider/js/jquery.easing.min.js" type="text/javascript"></script>
		<script src="{$STORE_URL}/content-slider/js/jquery.touchSwipe.min.js" type="text/javascript"></script>
		<script src="{$STORE_URL}/content-slider/js/jquery.liquid-slider.min.js" type="text/javascript"></script>

		<div class="liquid-slider" id="content-slider">

			{foreach from=$SLIDES item=slide}

				<div>
					{if $CONFIG.sfws_content_slider_include_title == 'true'}
						<h2 class="content-slider-title">{$slide.slide_title}</h2>
					{/if}
					{$slide.slide_content}
				</div>

			{/foreach}

		</div>

		<script type="text/javascript">
			$('#content-slider').liquidSlider({
				// Auto Slide
				autoSlide: {$CS_AUTO_SLIDE},
				autoSlideDirection: "{$CS_AUTO_SLIDE_DIRECTION}",
				autoSlideInterval: {$CS_AUTO_SLIDE_INTERVAL},
				forceAutoSlide: {$CS_FORCE_AUTO_SLIDE},
				pauseOnHover: {$CS_PAUSE_ON_HOVER},
				// Height Options
				autoHeight: {$CS_AUTO_HEIGHT},
				heightEaseDuration: {$CS_HEIGHT_EASE_DURATION},
				heightEaseFunction: "{$CS_HEIGHT_EASE_FUNCTION}",
				// Sliding Options
				slideEaseDuration: {$CS_SLIDE_EASE_DURATION},
				slideEaseFunction: "{$CS_SLIDE_EASE_FUNCTION}",
				continuous: true,
				fadeInDuration: {$CS_FADE_IN_DURATION},
				fadeOutDuration: {$CS_FADE_OUT_DURATION},
				// Dynamic Arrows
				dynamicArrows: {$CS_DYNAMIC_ARROWS},
				dynamicArrowsGraphical: {$CS_DYNAMIC_ARROWS_GRAPHICAL},
				dynamicArrowLeftText: "{$CS_DYNAMIC_ARROW_LEFT_TEXT}",
				dynamicArrowRightText: "{$CS_DYNAMIC_ARROW_RIGHT_TEXT}",
				hideSideArrows: {$CS_HIDE_SIDE_ARROWS},
				hideSideArrowsDuration: {$CS_HIDE_SIDE_ARROWS_DURATION},
				hoverArrows: {$CS_HOVER_ARROWS},
				hoverArrowDuration: {$CS_HOVER_ARROWS_DURATION},
				// Dynamic Tabs
				dynamicTabs: {$CS_DYNAMIC_TABS},
				dynamicTabsAlign: "{$CS_DYNAMIC_TABS_ALIGN}",
				dynamicTabsPosition: "{$CS_DYNAMIC_TABS_POSITION}",
				includeTitle: {$CS_INCLUDE_TITLE},
				panelTitleSelector :".content-slider-title",
				// Responsive Settings
				responsive: {$CS_RESPONSIVE},
				mobileNavigation: {$CS_MOBILE_NAVIGATION},
				mobileNavDefaultText: "{$CS_MOBILE_NAV_DEFAULT_TEXT}",
				hideArrowsWhenMobile: {$CS_HIDE_ARROWS_WHEN_MOBILE},
				hideArrowsThreshold: {$CS_HIDE_ARROWS_THRESHOLD},
				swipe: {$CS_SWIPE}
			});
		</script>

	</div>
	</div>
	{/if}

{/if}