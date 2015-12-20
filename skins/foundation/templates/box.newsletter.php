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
<div id="box-newsletter">
{*  {if $IS_USER}
<h3>Your Newsletter Subscription</h3>
<a href="{$STORE_URL}/index.php?_a=newsletter">Check Status</a></h3>
   {else} *}

<!-- Begin MailChimp Signup Form -->
<!--<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">-->

<div id="mc_embed_signup">
<form action="//dirtybutter.us1.list-manage.com/subscribe/post?u=613d60cf5e4c24411a1084110&amp;id=15bfb10560" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
<br>   
	<h3>Check on Status - Update Profile -  Subscribe to our Newsletter</h3>
<p>Get information about  <strong>Special Discounts and Advance Notice of Sales</strong>, as well as news about our <a href="//yesterdaysmemories.dirtybutter.com" target="_blank">Yesterday's Memories</a> blog.</p>

<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address </label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">First Name</label>
	<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_613d60cf5e4c24411a1084110_15bfb10560" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
<p>(To complete the newsletter subscription process, please click the link in the email we will send.)</p>
</form>
   <div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
   <div class="hide" id="validate_already_subscribed">{$LANG.newsletter.notify_already_subscribed}</div>

</div>

<!--End mc_embed_signup-->
</div>
{* {/if} *}