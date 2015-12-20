{if isset($RANDOM_SITE_TESTIMONIAL)}
<div class="panel" id="testimonial-panel">
<p align="center">
			<a href="{$ADD_TESTIMONIAL_URL}" title="{$LANG.testimonials.testimonials_side_box_add_link}">{$LANG.testimonials.testimonials_side_box_add_link}</a>
			&nbsp; &nbsp;
			<a href="{$VIEW_TESTIMONIALS_URL}" title="{$LANG.testimonials.testimonials_side_box_view_link}">{$LANG.testimonials.testimonials_side_box_view_link}</a>
		</p>
<h3>{$testimonial.testimonial_title}</h3>	<div style="padding: 1px;">

		{$testimonial.testimonial_long}

		<p align="left"><i>- {$testimonial.customer_name}</i></p>
			</div>
</div>
{/if}