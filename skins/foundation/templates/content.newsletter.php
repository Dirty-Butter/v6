{*
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

<h3>Check on Status - Update Profile - Subscribe to our Newsletter</h3>
Get information about  <strong>Special Discounts and Advance Notice of Sales</strong>, as well as news about our Free <a href="https://www.facebook.com/groups/plushmemories/" target="_blank">Plush Memories Lost Toy Search Service.</a> Facebook Group.
<br><br>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="//dirtybutter.us1.list-manage.com/subscribe/post?u=613d60cf5e4c24411a1084110&amp;id=15bfb10560" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll"><p>Get information about  <strong>Special Discounts and Advance Notice of Sales</strong>, as well as news about our Free <a href="https://www.facebook.com/groups/plushmemories/" target="_blank">Plush Memories Lost Toy Search Service.</a> Facebook Group.

	<h3>Check on Status - Update Profile -  Subscribe to our Newsletter</h3>

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
<p>(To complete the newsletter subscription process, please click the link in the email we will send.)</p>
</form>
</div>

<!--End mc_embed_signup-->
{* {if isset($CTRL_VIEW) && $CTRL_VIEW}
<h2>{$NEWSLETTER.subject}</h2>
<div>{$NEWSLETTER.content_html}</div>
{else}
<h2>{$LANG.newsletter.subscription}</h2>
{if $IS_USER}
{if $SUBSCRIBED}
<p>{$LANG.newsletter.customer_is_subscribed}</p>
<a href="{$URL.unsubscribe}" class="button alert">{$LANG.newsletter.unsubscribe}</a>
{else}
<p>{$LANG.newsletter.customer_not_subscribed}</p>
<a href="{$URL.subscribe}" class="button">{$LANG.newsletter.subscribe_now}</a>
{/if}
{else}
<p>{$LANG.newsletter.enter_email_subscribe_unsubscribe}</p>
<form action="{$VAL_SELF}" method="post" id="{$FORM_ID}">
   <div class="row">
      <div class="small-12 large-8 columns">
         <label for="newsletter_email">{$LANG.common.email}</label>
         <input type="text" name="{$SUBSCRIBE_MODE}" class="required" id="newsletter_email" placeholder="{$LANG.common.email} {$LANG.form.required}">
      </div>
   </div>
   <div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
   <div class="hide" id="validate_already_subscribed">{$LANG.newsletter.notify_already_subscribed}</div>
   <div class="row">
      <div class="small-12 large-8 columns"><input name="submit" class="button" type="submit" value="{$LANG.form.submit}"></div>
   </div>
</form>
{/if}
<h2>{$LANG.newsletter.newsletters}</h2>
{if isset($NEWSLETTERS)}
<p>{$LANG.newsletter.view_newsletter_archive}</p>
<table>
   <thead>
      <tr>
         <th>{$LANG.common.subject}</th>
         <th>{$LANG.common.date}</th>
      </tr>
   </thead>
   <tbody>
      {foreach from=$NEWSLETTERS item=newsletter}
      <tr>
         <td><a href="{$newsletter.view}">{$newsletter.subject}</a></td>
         <td>{$newsletter.date_sent}</td>
      </tr>
      {/foreach}
   </tbody>
</table>
{else}
<p>{$LANG.newsletter.no_archived_newsletters}</p>
{/if} 
{/if} *}