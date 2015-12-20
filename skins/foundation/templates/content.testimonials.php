<h2>{$LANG.testimonials.testimonials_page_title}</h2>

{if isset($VIEW_TESTIMONIALS_ENABLED)}
	<!--<div>{$VIEW_TESTIMONIALS_ENABLED}</div>-->
{/if}

{if isset($VIEW_TESTIMONIALS_DISABLED)}
	<div>{$VIEW_TESTIMONIALS_DISABLED}</div>
{/if}

{if isset($TESTIMONIALS) && $TESTIMONIALS}

	<div id="ccScrollTestimonials">

		<div class="testimonials_list">

<a href="{$STORE_URL}/addtestimonial.html"> Add Testimonial</a>
<br><br>

			{foreach from=$TESTIMONIALS item=testimonial}
				<div class="small-12 large-12 columns" style="margin-bottom: 15px; border: 1px solid #CCCCCC;">
<h3>{$testimonial.testimonial_title}</h3>
					{$testimonial.testimonial_long}
					<br >
					<i>- {$testimonial.customer_name}, {$testimonial.testimonial_date}</i>
				</div>
			{/foreach}

		</div>

		{if $AJAX_PAGINATION}
			{if ($page < $total)}
				{$params[$var_name] = $page + 1}
				<a href="{$current}{http_build_query($params)}{$anchor}" class="button tiny expand" id="ccScrollTestimonials-next">{$LANG.common.more} <i class="fa fa-angle-down"></i></a>
			{/if}
		{/if}

		{if $TRADITIONAL_PAGINATION}
			{if isset($PAGINATION)}
				<div class="row">
					<div class="small-12 large-9 columns">
						{$PAGINATION}
					</div>
					<div class="large-3 columns show-for-medium-up">
						<dl>
							<dd>
								<select class="url_select">
								{foreach from=$PAGE_SPLITS item=page_split}
									<option value="{$page_split.url}"{if $page_split.selected} selected{/if}>{$page_split.amount}</option>
								{/foreach}
								</select>
							</dd>
						</dl>
					</div>
				</div>
			{/if}
		{/if}

	</div>

	<div class="hide" id="lang_loading">{$LANG.common.loading}</div>

{/if}