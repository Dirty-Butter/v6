{*  PLUSH
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
<span class="redbold">{$LANG.account.already_registered} <a href="{$STORE_URL}/login.html">{$LANG.account.login_here}</a></span>
<br>
<h2>{$LANG.account.register}</h2>
<form action="{$VAL_SELF}" id="registration_form" method="post" name="registration">
   {foreach from=$LOGIN_HTML item=html}
   {$html}
   {/foreach}
   <div class="row">
      <div class="small-4 columns"><label for="title" class="show-for-medium-up">{$LANG.user.title}</label><input type="text" name="title" id="title" value="{$DATA.title}" placeholder="{$LANG.user.title}"></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="first_name" class="show-for-medium-up">{$LANG.user.name_first}</label><input type="text" name="first_name" id="first_name" value="{$DATA.first_name}" placeholder="{$LANG.user.name_first} {$LANG.form.required}" required ></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="last_name" class="show-for-medium-up">{$LANG.user.name_last}</label><input type="text" name="last_name" id="last_name" value="{$DATA.last_name}"  placeholder="{$LANG.user.name_last} {$LANG.form.required}" required></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="email" class="show-for-medium-up">{$LANG.common.email}</label><input type="text" name="email" id="email" value="{$DATA.email}" placeholder="{$LANG.common.email}  {$LANG.form.required}" required ></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="phone" class="show-for-medium-up">{$LANG.address.phone}</label><input type="text" name="phone" id="phone"  value="{$DATA.phone}" placeholder="{$LANG.address.phone} {$LANG.form.required}" required></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="mobile" class="show-for-medium-up">{$LANG.address.mobile}</label><input type="text" name="mobile" id="mobile"  value="{$DATA.mobile}" placeholder="{$LANG.address.mobile}"></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="password" class="show-for-medium-up">{$LANG.account.password}</label><input type="password" autocomplete="off" name="password" id="password" placeholder="{$LANG.account.password} {$LANG.form.required}" required ></div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns"><label for="passconf" class="show-for-medium-up">{$LANG.account.password_confirm}</label><input type="password" autocomplete="off" name="passconf" id="passconf" placeholder="{$LANG.account.password_confirm}  {$LANG.form.required}" required ></div>
   </div>
 {* MODSINDEX  {$DISPLAY_RECAPTCHA} <br> *}
   {include file='templates/content.recaptcha.php'}
<br> 
   {if $TERMS_CONDITIONS}
   <div class="row">
      <div class="small-12 large-8 columns"><span id="error_terms_agree"><input type="checkbox" id="terms" name="terms_agree" value="1" {$TERMS_CONDITIONS_CHECKED} rel="error_terms_agree"><label for="terms">{$LANG.account.register_terms_agree_link|replace:'%s':{$TERMS_CONDITIONS}}</label></span></div>
   </div>
   {/if}
   <div class="row">
      <div class="small-12 large-8 columns">
<hr>
<!-- Begin MailChimp Signup Form -->
<!--<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">-->

<div id="mc_embed_signup">
<form action="//dirtybutter.us1.list-manage.com/subscribe/post?u=613d60cf5e4c24411a1084110&amp;id=15bfb10560" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll"><p>Get information about <strong>Special Discounts and Advance Notice of Sales</strong>, as well as news about our Free <a href="https://www.facebook.com/groups/plushmemories/" target="_blank">Plush Memories Lost Toy Search Service.</a> Facebook Group.
<br>   
<h3>Check on Status - Update Profile -  Subscribe to our Newsletter</h3>
Get information about <strong>Special Discounts and Advance Notice of Sales</strong>, as well as news about our Free <a href="https://www.facebook.com/groups/plushmemories/" target="_blank">Plush Memories Lost Toy Search Service.</a> Facebook Group.
<br><br>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="//dirtybutter.us1.list-manage.com/subscribe/post?u=613d60cf5e4c24411a1084110&amp;id=15bfb10560" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address </label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">First Name</label>
	<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
</div>
<div class="mc-field-group input-group">
    <strong>Email Format </strong>
    <ul><li><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label for="mce-EMAILTYPE-0">html</label></li>
<li><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label for="mce-EMAILTYPE-1">text</label></li>
</ul>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_613d60cf5e4c24411a1084110_15bfb10560" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
<p>(To complete the newsletter subscription process, please click the link in the email we will send.)   </p>
</form>
</div>
<!--End mc_embed_signup--> 
<br>
      </div>
   </div>
   <div class="row">
      <div class="small-12 large-8 columns clearfix">
      	  <input type="submit" name="register" value="{$LANG.account.register}" class="button">
	      <button type="reset" class="button secondary right"><i class="fa fa-refresh"></i> {$LANG.common.reset}</button>
      </div>
   </div>
</form>
<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
<div class="hide" id="validate_email_in_use">{$LANG.account.error_email_in_use}</div>
<div class="hide" id="validate_firstname">{$LANG.account.error_firstname_required}</div>
<div class="hide" id="validate_lastname">{$LANG.account.error_lastname_required}</div>
<div class="hide" id="validate_terms_agree">{$LANG.account.error_terms_agree}</div>
<div class="hide" id="validate_password">{$LANG.account.error_password_empty}</div>
<div class="hide" id="validate_password_length">{$LANG.account.error_password_length}</div>
<div class="hide" id="validate_password_mismatch">{$LANG.account.error_password_mismatch}</div>
<div class="hide" id="validate_phone">{$LANG.account.error_valid_phone}</div>
<div class="hide" id="validate_mobile">{$LANG.account.error_valid_mobile_phone}</div>
<div class="hide" id="validate_required">{$LANG.form.required}</div>