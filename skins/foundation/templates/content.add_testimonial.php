<h2>{$LANG.testimonials.testimonials_add_title}</h2>

{if isset($ADD_TESTIMONIAL_DISABLED)}
	<p>{$ADD_TESTIMONIAL_DISABLED}</p>
{/if}

{if isset($ADD_TESTIMONIAL_ENABLED)}
	{* <p>{$ADD_TESTIMONIAL_ENABLED}</p> *}

	<form action="{$VAL_SELF}" method="post">
		<fieldset>
			<div><label for="add_testimonial_name">{$LANG.common.name}</label><span><input type="text" name="add_testimonial[customer_name]" id="add_testimonial_name" value="{$MESSAGE.name}" placeholder="{$LANG.form.required}" class="textbox required" /></span></div>
			<div><label for="add_testimonial_email">{$LANG.common.email}</label><span><input type="text" name="add_testimonial[customer_email]" id="add_testimonial_email" value="{$MESSAGE.email}" placeholder="{$LANG.form.required}" class="textbox required" /></span></div>
			<div><label for="add_testimonial_title">{$LANG.testimonials.testimonials_add_testimonial_title}</label><span><input type="text"  name="add_testimonial[testimonial_title]" id="add_testimonial_title">{$MESSAGE.title}</span></div>
			<div><label for="add_testimonial_short">{$LANG.testimonials.testimonials_add_short_label}</label><span><textarea name="add_testimonial[testimonial_short]" id="add_testimonial_short" cols="40" rows="1">{$MESSAGE.short}</textarea></span></div>
			<div><label for="add_testimonial_long">{$LANG.testimonials.testimonials_add_long_label}</label><span><textarea name="add_testimonial[testimonial_long]" id="add_testimonial_long" placeholder="{$LANG.form.required}" class="textbox required" cols="40" rows="10">{$MESSAGE.long}</textarea></span></div>
			{include file='templates/content.recaptcha.php'} 
		</fieldset>
		<div><input type="submit" class="button" value="{$LANG.testimonials.testimonials_add_send}" /></div>
	</form>
<br>
{/if}