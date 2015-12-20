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
{if $COOKIE_DIALOGUE}
<div class="row" id="eu_cookie_dialogue">
   <form action="{$VAL_SELF}" class="marg" method="POST">
      <div class="small-12 columns"> {* MY WIDTH *}
         {$LANG.notification.cookie_dialogue|replace:'%s':{$CONFIG.store_name}} <a href="{$STORE_URL}/security-privacy-policy.html">Security-Privacy Policy</a>&nbsp;
         <input type="submit" class="button tiny secondary" name="accept_cookies_submit" id="eu_cookie_button" value="{$LANG.common.continue}">
         <input type="hidden" name="accept_cookies" value="1">
      </div>
   </form>
</div>
{/if}