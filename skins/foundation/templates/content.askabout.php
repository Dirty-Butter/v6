{* PLUSH *}
<h1 class="name fn">{$LANG.askaboutaproduct.title} {if isset($ASKABOUT_STATUS) && $ASKABOUT_STATUS == 1} - {$ASKABOUT_PRODUCT_NAME} {/if}</h1>
<div class="wrapper">

	{if isset($ASKABOUT_STATUS) && $ASKABOUT_STATUS == 1}
				
		<div class="lower clearfix">
			<div><label for="product_id"><strong>{$LANG.askaboutaproduct.product_id}</strong></label> <span>{$ASKABOUT_PRODUCT_ID}</span></div>
			<div><label for="product_code"><strong>{$LANG.askaboutaproduct.product_code}</strong></label> <span>{$ASKABOUT_PRODUCT_CODE}</span></div>
			<div><label for="product_name"><strong>{$LANG.askaboutaproduct.product_name}</strong></label> <span>{$ASKABOUT_PRODUCT_NAME}</span></div>
			<div><label for="product_description"><strong>{$LANG.askaboutaproduct.product_description}</strong></label><span>{$ASKABOUT_PRODUCT_DESCRIPTION}</span></div>
		
</div>

<p><strong>{$ASKABOUT_DESCRIPTION}</strong></p>

		<clear="ALL" />

		<form action="{$VAL_SELF}" method="post">
			
			<div id="write-review">
			
				<fieldset>
					<p class="your_name">
						<label for="your_name">{$LANG.askaboutaproduct.your_name}</label>
						<input type="text" name="askabout[your_name]" value="{$MESSAGE.your_name}" required placeholder="{$LANG.askaboutaproduct.your_name}" id="your_name" class="required" />
					</p>
					<p class="your_email">
						<label for="your_email">{$LANG.askaboutaproduct.your_email}</label>
						<input type="text" name="askabout[your_email]" value="{$MESSAGE.your_email}" required placeholder="{$LANG.askaboutaproduct.your_email}" id="your_email" class="required" />
					</p>
					{if $ASKABOUT_DEPARTMENTS}
					<p class="contact_dept">
						<label for="department">{$LANG.common.department}  {$LANG.form.required}</label>
						<select name="askabout[department]" id="department" required class="required">
							<option value="">{$LANG.form.please_select}</option>
							{foreach from=$ASKABOUT_DEPARTMENTS item=dept}
								<option value="{$dept.key}"{$dept.selected}>{$dept.name}</option>
							{/foreach}
						</select>
					</p>
					{/if}
 					<!--
					<p class="your_phone">
						<label for="your_phone">{$LANG.askaboutaproduct.your_phone}</label>
						<input type="text" name="askabout[your_phone]" value="{$MESSAGE.your_phone}" required placeholder="{$LANG.askaboutaproduct.your_phone}" id="your_phone" class="required" />
					</p>
					-->

					{include file='templates/content.recaptcha.php'}
					
				</fieldset>
<!-- CHANGE CUTOFF FOR MAKE AN OFFER IN CUBECART.CLASS.PHP  ABOUT LINE 1368 -->
				
				{if $ASKABOUT_PRODUCT_DESCRIPTION_3}
					<p><h3><!--{$LANG.askaboutaproduct.product_valid_description_3} -->
You can also link to <a href="{$STORE_URL}/index.php?_a=viewProd&productId={$ASKABOUT_PRODUCT_ID}">this item</a> on our <a href="https://www.facebook.com/groups/plushmemories" target="_blank">Facebook Group</a>, so our Fabulous Finders can  help you find it.</h3></p>
				{/if}

				{if $ASKABOUT_PRODUCT_DESCRIPTION_2}
					<p><h3>{$LANG.askaboutaproduct.product_valid_description_2}</h3></p>
				{/if}

				
					<p class="your-email">
						<label for="message" class="return">{$LANG.askaboutaproduct.message}</label>
						<textarea id="message" name="askabout[message]" required placeholder="{$LANG.askaboutaproduct.message}" class="required" rows="10">{$MESSAGE.message}</textarea>
		
			</p>

<!--MODSINDEX RECAPTCHA MOD-->
{* {$DISPLAY_RECAPTCHA} *}
<!--END MODSINDEX RECAPTCHA MOD-->




<!--<fieldset>-->

					<input type="hidden" name="askabout[product_id]" value="{$ASKABOUT_PRODUCT_ID}" />
					<input type="hidden" name="askabout[product_code]" value="{$ASKABOUT_PRODUCT_CODE}" />
					<input type="hidden" name="askabout[product_name]" value="{$ASKABOUT_PRODUCT_NAME}" />				
					<p class="actions">
						<input type="submit" value="{$LANG.documents.send_message}" class="button" />
					</p>
			<!--	</fieldset> -->

			</div>

		</form>
<div class="hide" id="validate_your_email">{$LANG.common.error_email_invalid}</div>
	{/if}

</div>