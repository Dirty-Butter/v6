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
<form id="form-settings" action="{$PHP_SELF}" method="post" enctype="multipart/form-data">
   <div id="General" class="tab_content">
      <h3>{$LANG.common.general}</h3>
      <fieldset>
         <legend>{$LANG.settings.title_geographical}</legend>
         <div><label for="store_name">{$LANG.settings.store_name}</label><span><input name="config[store_name]" id="store_name" type="text" class="textbox" value="{$CONFIG.store_name}"></span></div>
         <div><label for="store_address">{$LANG.address.line1}</label><span><textarea name="config[store_address]" id="store_address" class="textbox">{$CONFIG.store_address}</textarea></span></div>
         <div><label for="country-list">{$LANG.address.country}</label><span><select name="config[store_country]" id="country-list" class="textbox">
            {foreach from=$COUNTRIES item=country}<option value="{$country.numcode}"{$country.selected}>{$country.name}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="state-list">{$LANG.address.state}</label><span><input type="text" name="config[store_zone]" id="state-list" class="textbox" value="{$CONFIG.store_zone}"></span></div>
         <div><label for="store_postcode">{$LANG.address.postcode}</label><span><input name="config[store_postcode]" id="store_postcode" type="text" class="textbox" value="{$CONFIG.store_postcode}"></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_tax_lang}</legend>
         <div><label for="default_language">{$LANG.settings.default_language}</label><span><select name="config[default_language]" id="default_language" class="textbox">
            {foreach from=$LANGUAGES item=language}<option value="{$language.code}"{$language.selected}>{$language.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="default_currency">{$LANG.settings.default_currency}</label><span><select name="config[default_currency]" id="default_currency" class="textbox">
            {foreach from=$CURRENCIES item=currency}<option value="{$currency.code}"{$currency.selected}>{$currency.code} - {$currency.name}</option>{/foreach}
            </select></span>
         </div>
         {if !in_array($CONFIG.store_country, array(840, 124, 036))}
         <div><label for="tax_number">{$LANG.settings.tax_number}</label><span><input name="config[tax_number]" id="tax_number" type="text" class="textbox" value="{$CONFIG.tax_number}" placeholder="{$LANG.settings.tax_number_placeholder}"></span></div>
         {/if}
         <div><label for="basket_tax_by_delivery">{$LANG.settings.tax_customer_by}</label><span><select name="config[basket_tax_by_delivery]" id="basket_tax_by_delivery" class="textbox">
            {foreach from=$OPT_BASKET_TAX_BY_DELIVERY item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.social_accounts}</legend>
         <div><label for="facebook">Facebook</label><span><input name="config[facebook]" id="facebook" type="text" class="textbox" value="{$CONFIG.facebook}"></span></div>
         <div><label for="flickr">Flickr</label><span><input name="config[flickr]" id="flickr" type="text" class="textbox" value="{$CONFIG.flickr}"></span></div>
         <div><label for="google_plus">Google+</label><span><input name="config[google_plus]" id="google_plus" type="text" class="textbox" value="{$CONFIG.google_plus}"></span></div>
         <div><label for="instagram">Instagram</label><span><input name="config[instagram]" id="instagram" type="text" class="textbox" value="{$CONFIG.instagram}"></span></div>
         <div><label for="linkedin">LinkedIn</label><span><input name="config[linkedin]" id="linkedin" type="text" class="textbox" value="{$CONFIG.linkedin}"></span></div>
         <div><label for="pinterest">Pinterest</label><span><input name="config[pinterest]" id="pinterest" type="text" class="textbox" value="{$CONFIG.pinterest}"></span></div>
         <div><label for="twitter">Twitter</label><span><input name="config[twitter]" id="twitter" type="text" class="textbox" value="{$CONFIG.twitter}"></span></div>
         <div><label for="vimeo">Vimeo</label><span><input name="config[vimeo]" id="vimeo" type="text" class="textbox" value="{$CONFIG.vimeo}"></span></div>
         <div><label for="wordpress">WordPress</label><span><input name="config[wordpress]" id="wordpress" type="text" class="textbox" value="{$CONFIG.wordpress}"></span></div>
         <div><label for="youtube">YouTube</label><span><input name="config[youtube]" id="youtube" type="text" class="textbox" value="{$CONFIG.youtube}"></span></div>
      </fieldset>
   </div>
   <div id="Features" class="tab_content">
      <h3>{$LANG.settings.title_features}</h3>
      <fieldset>
         <legend>{$LANG.settings.google_analytics}</legend>
         <div><label for="google_analytics">{$LANG.settings.google_analytics_id}</label><span><input name="config[google_analytics]" id="google_analytics" type="text" class="textbox" value="{$CONFIG.google_analytics}"></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.navigation.nav_prod_reviews}</legend>
         <div><label for="enable_reviews">{$LANG.settings.enable_reviews}</label><span><input name="config[enable_reviews]" id="enable_reviews" type="hidden" class="toggle" value="{$CONFIG.enable_reviews}"></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_orders}</legend>
         {*
            <div><label for="email_disable_alert">{$LANG.settings.email_disable_alert}</label><span><select name="config[email_disable_alert]" id="email_disable_alert" class="textbox">
         {foreach from=$OPT_EMAIL_DISABLE_ALERT item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span></div>
         *}
         <div><label for="basket_order_expire">{$LANG.settings.expire_pending}</label><span><input name="config[basket_order_expire]" id="basket_order_expire" class="textbox number" value="{$CONFIG.basket_order_expire}"> {$LANG.common.blank_to_disable}</span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_sales}</legend>
( BSMITHER HACK Change setting in skin box.navigation.php to match Disabled, Per Product, or Global Sales Items  - Change line 731 in seo.class.php to include Sales Items in Sitemap or not)
         <div><label for="catalogue_sale_mode">{$LANG.settings.sales_mode}</label><span><select name="config[catalogue_sale_mode]" id="catalogue_sale_mode" class="textbox">
            {foreach from=$OPT_CATALOGUE_SALE_MODE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="catalogue_sale_percentage">{$LANG.settings.sales_percentage}</label><span><input name="config[catalogue_sale_percentage]" id="catalogue_sale_percentage" type="text" class="textbox number" value="{$CONFIG.catalogue_sale_percentage}">%</span></div>
         <div><label for="catalogue_sale_items">{$LANG.settings.sales_items_count}</label><span><input name="config[catalogue_sale_items]" id="catalogue_sale_items" type="text" class="textbox number" value="{$CONFIG.catalogue_sale_items}"></span></div>
      		
			{* BSMITHER SALES METADATA HACK *}
			<div><label for="catalogue_sale_seo_meta_title">{$LANG.settings.seo_meta_title}</label><span><input name="config[catalogue_sale_seo_meta_title]" id="catalogue_sale_seo_meta_title" class="textbox" type="text" value="{$CONFIG.catalogue_sale_seo_meta_title}" /></span></div>
			<div><label for="catalogue_sale_seo_meta_keywords">{$LANG.settings.seo_meta_keywords}</label><span><textarea name="config[catalogue_sale_seo_meta_keywords]" id="catalogue_sale_seo_meta_keywords" class="textbox">{$CONFIG.catalogue_sale_seo_meta_keywords}</textarea></span></div>
			<div><label for="catalogue_sale_seo_meta_description">{$LANG.settings.seo_meta_description}</label><span><textarea name="config[catalogue_sale_seo_meta_description]" id="catalogue_sale_seo_meta_description" class="textbox">{$CONFIG.catalogue_sale_seo_meta_description}</textarea></span></div>
	  		{* END BSMITHER SALES METADATA HACK *}
	  </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_flood}</legend>
         <div><label for="recaptcha">{$LANG.settings.recaptcha_enable}</label><span>
            <select name="config[recaptcha]" id="recaptcha" class="textbox">
            {foreach from=$OPT_RECAPTCHA item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select>
         </span></div>
         <div><label for="recaptcha_public_key">{$LANG.settings.recaptcha_public_key}</label><span><input name="config[recaptcha_public_key]" id="recaptcha_public_key" class="textbox" value="{$CONFIG.recaptcha_public_key}"></span></div>
         <div><label for="recaptcha_secret_key">{$LANG.settings.recaptcha_secret_key}</label><span><input name="config[recaptcha_secret_key]" id="recaptcha_secret_key" class="textbox" value="{$CONFIG.recaptcha_secret_key}"></span></div>
         <div class="clear important"><strong>{$LANG.settings.new_recaptcha_note}</strong></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.common.misc}</legend>
         <div><label for="admin_notify_status">{$LANG.settings.admin_order_status_notification}</label><span><select name="config[admin_notify_status]" id="admin_notify_status" class="textbox">
            {foreach from=$OPT_ADMIN_NOTIFY_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="no_skip_processing_check">{$LANG.settings.no_skip_processing_check}</label><span><input name="config[no_skip_processing_check]" id="no_skip_processing_check" type="hidden" class="toggle" value="{$CONFIG.no_skip_processing_check}"></span></div>
         <div><label for="catalogue_hide_prices">{$LANG.settings.hide_prices}</label><span><input name="config[catalogue_hide_prices]" id="catalogue_hide_prices" type="hidden" class="toggle" value="{$CONFIG.catalogue_hide_prices}"></span>&nbsp;{$LANG.settings.no_admin_affect}</div>
         <div><label for="catalogue_mode">{$LANG.settings.catalogue_mode}</label><span><input name="config[catalogue_mode]" id="catalogue_mode" type="hidden" class="toggle" value="{$CONFIG.catalogue_mode}"></span></div>
         <div><label for="allow_no_shipping">{$LANG.settings.allow_no_shipping}</label><span><input name="config[allow_no_shipping]" id="allow_no_shipping" type="hidden" class="toggle" value="{$CONFIG.allow_no_shipping}"></span></div>
         <div><label for="disable_shipping_groups">{$LANG.settings.disable_shipping_groups}</label><span><input name="config[disable_shipping_groups]" id="disable_shipping_groups" type="hidden" class="toggle" value="{$CONFIG.disable_shipping_groups}"></span></div>
         <div><label for="cookie_dialogue">{$LANG.settings.cookie_dialogue}</label><span><input name="config[cookie_dialogue]" id="cookie_dialogue" type="hidden" class="toggle" value="{$CONFIG.cookie_dialogue}"></span></div>
         <div><label for="force_completed">{$LANG.settings.force_completed}</label><span><input name="config[force_completed]" id="force_completed" type="hidden" class="toggle" value="{$CONFIG.force_completed}"></span></div>
         <div><label for="disable_estimates">{$LANG.settings.disable_estimates}</label><span><input name="config[disable_estimates]" id="disable_estimates" type="hidden" class="toggle" value="{$CONFIG.disable_estimates}"></span></div>
      </fieldset>
   </div>
   <div id="Layout" class="tab_content">
      <h3>{$LANG.settings.title_layout}</h3>
      <fieldset>
         <legend>{$LANG.settings.title_display}</legend>
          <div><label for="catalogue_products_per_page">{$LANG.settings.product_per_page} (<a href="#" onclick="$('#per_page_note').slideToggle()">Depreciated</a>)</label><span><input name="config[catalogue_products_per_page]" id="catalogue_products_per_page" class="textbox number" value="{$CONFIG.catalogue_products_per_page}"></span></div>
         <div><label for="default_product_sort">{$LANG.settings.default_product_sort}</label>
            <span>
            <select name="config[product_sort_column]" id="product_sort_column" class="textbox">
            {foreach from=$OPT_PRODUCT_SORT_COLUMN item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select>
            <select name="config[product_sort_direction]" id="product_sort_direction" class="textbox">
            {foreach from=$OPT_PRODUCT_SORT_DIRECTION item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select>
            </span>
         </div>
         <div><label for="catalogue_show_empty">{$LANG.settings.category_display_empty}</label><span><select name="config[catalogue_show_empty]" id="catalogue_show_empty" class="textbox">
            {foreach from=$OPT_CATALOGUE_SHOW_EMPTY item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="product_precis">{$LANG.settings.product_precis}</label><span><input name="config[product_precis]" id="product_precis" class="textbox number" value="{$CONFIG.product_precis}"></span></div>
         <div><label for="catalogue_expand_tree">{$LANG.settings.category_expand_tree}</label><span><select name="config[catalogue_expand_tree]" id="catalogue_expand_tree" class="textbox">
            {foreach from=$OPT_CATALOGUE_EXPAND_TREE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="basket_jump_to">{$LANG.settings.basket_jump_to}</label><span><select name="config[basket_jump_to]" id="basket_jump_to" class="textbox">
            {foreach from=$OPT_BASKET_JUMP_TO item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="disable_checkout_terms">{$LANG.settings.disable_checkout_terms}</label><span><input name="config[disable_checkout_terms]" id="disable_checkout_terms" type="hidden" class="toggle" value="{$CONFIG.disable_checkout_terms}"></span></div>
         <div><label for="default_rss_feed">{$LANG.settings.default_rss}</label><span><input name="config[default_rss_feed]" id="default_rss_feed" class="textbox" value="{$CONFIG.default_rss_feed}"></span></div>
      </fieldset>
      <div style="display:none" id="per_page_note">
      <h3>{$LANG.settings.product_per_page}</h3>
      <p>This setting has been replaced with the layout > products > perpage section of the skins config.xml file wich includes page splits. This setting is ignored for skins that have this block of XML. Please edit the skins config.xml file instead.</p> 
      <p>Example:</p>
<pre>&lt;layout&gt;
   &lt;products&gt;
      &lt;perpage amount="6" /&gt;
         &lt;perpage default="true" amount="12" /&gt;
         &lt;perpage amount="24" /&gt;
         &lt;perpage amount="48" /&gt;
      &lt;perpage amount="96" /&gt;
   &lt;/products&gt;
&lt;/layout&gt;</pre>
</div>
      <fieldset>
         <legend>{$LANG.settings.title_popular_latest}</legend>
         <div><label for="catalogue_latest_products">{$LANG.settings.product_latest}</label><span><select name="config[catalogue_latest_products]" id="catalogue_latest_products" class="textbox">
            {foreach from=$OPT_CATALOGUE_LATEST_PRODUCTS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="catalogue_latest_products_count">{$LANG.settings.product_latest_number}</label><span><input name="config[catalogue_latest_products_count]" id="catalogue_latest_products_count" type="text" class="textbox number" value="{$CONFIG.catalogue_latest_products_count}"></span></div>
         <div><label for="catalogue_popular_products_count">{$LANG.settings.product_popular}</label><span><input name="config[catalogue_popular_products_count]" id="catalogue_popular_products_count" class="textbox number" value="{$CONFIG.catalogue_popular_products_count}"></span></div>
         <div><label for="catalogue_popular_products_source">{$LANG.settings.product_popular_source}</label><span><select name="config[catalogue_popular_products_source]" id="catalogue_popular_products_source" class="textbox">
            {foreach from=$OPT_CATALOGUE_POPULAR_PRODUCTS_SOURCE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_skins}</legend>
         <div><label for="skin_folder">{$LANG.settings.skins_default_front}</label><span>
            <input type="hidden" class="default-style" value="{$CONFIG.skin_style}">
            <select name="config[skin_folder]" id="skin_folder" class="textbox select-skin no-drop">
            {foreach from=$SKINS item=skin}<option value="{$skin.name}" title="{$skin.description}"{$skin.selected}>{$skin.display}</option>{/foreach}
            </select>
            <select name="config[skin_style]" id="skin_style" class="textbox select-style"></select>
            </span>
         </div>
         <div><label for="admin_skin">{$LANG.settings.skins_default_admin}</label><span>
            <select name="config[admin_skin]" id="admin_skin" class="textbox">
            {foreach from=$SKINS_ADMIN item=skin}<option value="{$skin.name}" {$skin.selected}>{$skin.name}</option>{/foreach}
            </select>
            </span>
         </div>
         <div><label for="skin_change">{$LANG.settings.skins_allow_change}</label><span><select name="config[skin_change]" id="skin_change" class="textbox">
            {foreach from=$OPT_SKIN_CHANGE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         {if $SKINS_MOBILE}
         <div><label for="skin_folder_mobile">{$LANG.settings.skins_mobile_default_front}</label><span>
            <input type="hidden" class="default-style-mobile" value="{$CONFIG.skin_style_mobile}">
            <select name="config[skin_folder_mobile]" id="skin_folder_mobile" class="textbox select-skin-mobile no-drop">
            {foreach from=$SKINS_MOBILE item=skin}<option value="{$skin.name}" title="{$skin.description}"{$skin.selected}>{$skin.display}</option>{/foreach}
            </select>
            <select name="config[skin_style_mobile]" id="skin_style_mobile" class="textbox select-style-mobile"{$MOBILE_DISABLED}></select> 
            </span>
         </div>
         <div><label for="disable_mobile_skin">{$LANG.settings.disable_mobile_skin}</label><span><input name="config[disable_mobile_skin]" id="disable_mobile_skin" type="hidden" class="toggle" value="{$CONFIG.disable_mobile_skin}"></span></div>
         {else}
         	<input name="config[disable_mobile_skin]" id="disable_mobile_skin" type="hidden" value="1">
         {/if}
      </fieldset>
   </div>
   <div id="Stock" class="tab_content">
      <h3>{$LANG.settings.title_stock}</h3>
      <fieldset>
         <legend>{$LANG.settings.title_digital}</legend>
         <div><label for="download_expire">{$LANG.settings.digital_expiry}</label><span><input name="config[download_expire]" id="download_expire" type="text" class="textbox number" value="{$CONFIG.download_expire}"> {$LANG.common.blank_to_disable}</span></div>
         <div><label for="download_count">{$LANG.settings.digital_attempts}</label><span><input name="config[download_count]" id="download_count" type="text" class="textbox number" value="{$CONFIG.download_count}"> {$LANG.common.blank_to_disable}</span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_stock_general}</legend>
         <div><label for="stock_level">{$LANG.settings.stock_show}</label><span><input name="config[stock_level]" id="stock_level" type="hidden" class="toggle" value="{$CONFIG.stock_level}"></span></div>
         <div><label for="basket_out_of_stock_purchase">{$LANG.settings.stock_allow_oos}</label><span><input name="config[basket_out_of_stock_purchase]" id="basket_out_of_stock_purchase" type="hidden" class="toggle" value="{$CONFIG.basket_out_of_stock_purchase}"></span></div>
         <div><label for="stock_warn_type">{$LANG.settings.stock_warning_method}</label><span><select name="config[stock_warn_type]" id="stock_warn_type" class="textbox">
            {foreach from=$OPT_STOCK_WARN_TYPE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="stock_warn_level">{$LANG.settings.stock_warning_level}</label><span><input name="config[stock_warn_level]" id="stock_warn_level" type="text" class="textbox number" value="{$CONFIG.stock_warn_level}"></span></div>
         <div><label for="product_weight_unit">{$LANG.settings.weight_unit}</label><span><select name="config[product_weight_unit]" id="product_weight_unit" class="textbox">
            {foreach from=$OPT_PRODUCT_WEIGHT_UNIT item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="show_basket_weight">{$LANG.settings.show_basket_weight}</label><span><input name="config[show_basket_weight]" id="show_basket_weight" type="hidden" class="toggle" value="{$CONFIG.show_basket_weight}"></span></div>
         <div><label for="basket_allow_non_invoice_address">{$LANG.settings.dispatch_to_non_invoice}</label><span><input name="config[basket_allow_non_invoice_address]" id="basket_allow_non_invoice_address" type="hidden" class="toggle" value="{$CONFIG.basket_allow_non_invoice_address}"></span></div>
         <div><label for="stock_change_time">{$LANG.settings.stock_reduce}</label><span><select name="config[stock_change_time]" id="stock_change_time" class="textbox">
            {foreach from=$OPT_STOCK_CHANGE_TIME item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="hide_out_of_stock">{$LANG.settings.title_hide_out_of_stock}</label><span><input name="config[hide_out_of_stock]" id="hide_out_of_stock" type="hidden" class="toggle" value="{$CONFIG.hide_out_of_stock}"></span>&nbsp;{$LANG.settings.no_admin_affect}</div>
         <div><label for="update_main_stock">{$LANG.settings.update_main_stock}</label><span><input name="config[update_main_stock]" id="update_main_stock" type="hidden" class="toggle" value="{$CONFIG.update_main_stock}"></span>&nbsp;{$LANG.settings.matrix_in_use}</div>
      </fieldset>
   </div>
   <div id="Search_Engines" class="tab_content">
      <h3>{$LANG.settings.title_seo}</h3>
 {* BSMITHER PAGE=ALL METADATA NEW *}
 <fieldset><legend>Additional page=all {$LANG.settings.title_seo_meta_data}</legend>
    <div><label for="seo_meta_title_all">Additional page=all Meta Title</label><span><input type="text" name="config[catsAddlSEO][meta_title_all]" id="seo_meta_title_all" class="textbox" value="{$CONFIG.catsAddlSEO.meta_title_all}" /></span></div>
    {* <div><label for="seo_path_all">Additional page=all SEO Path</label><span><input type="text" name="config[catsAddlSEO][path_all]" id="seo_path_all" class="textbox" value="{$CONFIG.catsAddlSEO.path_all}" /></span></div> *}
    <div><label for="seo_meta_description_all">Additional page=all Meta Description<br /><br />%X for existing, %Y for Meta Title<br />
    Example:<br />
    All Meta Title-- <tt>All Our %X</tt><br />
    {* All SEO Path-- <tt>all-our-%X</tt><br /> *}
    All Meta Desc-- <tt>%X See all our %Y on one page.</tt></label><span><textarea name="config[catsAddlSEO][meta_description_all]" id="seo_meta_description_all" class="textbox">{$CONFIG.catsAddlSEO.meta_description_all}</textarea></span></div>
  </fieldset>
{* END BSMITHER PAGE=ALL METADATA NEW *}
{*ORIGINAL SEO SECTION*}
      <fieldset>
         <legend>{$LANG.settings.title_seo_global_meta_data}</legend>
         <div><label for="store_title">{$LANG.settings.seo_browser_title}</label><span><input name="config[store_title]" id="store_title" type="text" class="textbox" value="{$CONFIG.store_title}"></span></div>
         <div><label for="store_meta_description">{$LANG.settings.seo_meta_description}</label><span><textarea name="config[store_meta_description]" id="store_meta_description" class="textbox">{$CONFIG.store_meta_description}</textarea></span></div>
         <div><label for="store_meta_keywords">{$LANG.settings.seo_meta_keywords}</label><span><textarea name="config[store_meta_keywords]" id="store_meta_keywords" class="textbox">{$CONFIG.store_meta_keywords}</textarea></span></div>
         <div><label for="seo_add_cats">{$LANG.settings.seo_add_cats}</label><span>
         <select name="config[seo_add_cats]" id="seo_add_cats" class="textbox">
            {foreach from=$OPT_SEO_ADD_CATS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span></div>
         <div><label for="seo_cat_add_cats">{$LANG.settings.seo_cat_add_cats}</label><span>
         <select name="config[seo_cat_add_cats]" id="seo_cat_add_cats" class="textbox">
            {foreach from=$OPT_SEO_CAT_ADD_CATS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_seo_meta_behaviour}</legend>
         <div><label for="seo_metadata">{$LANG.settings.seo_meta_behaviour}</label><span><select name="config[seo_metadata]" id="seo_metadata" class="textbox">
            {foreach from=$OPT_SEO_METADATA item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
      </fieldset>
   </div>
   <div id="SSL" class="tab_content">
      <h3>{$LANG.settings.title_ssl}</h3>
      <fieldset>
         <legend>{$LANG.settings.title_ssl}</legend>
         <div><label for="ssl">{$LANG.settings.ssl_enable}</label><span><select name="config[ssl]" id="ssl" class="textbox">
            {foreach from=$OPT_SSL item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="standard_url">{$LANG.settings.standard_url}</label><span><input name="config[standard_url]" id="standard_url" type="text" class="textbox" value="{$CONFIG.standard_url}"> {$LANG.common.eg} http://www.example.com/store</span></div>
         <div><label for="cookie_domain">{$LANG.settings.cookie_domain}</label><span><input name="config[cookie_domain]" id="cookie_domain" type="text" class="textbox" value="{$CONFIG.cookie_domain}"> {$LANG.common.eg} .example.com</span></div>
      </fieldset>
   </div>
   <div id="Offline" class="tab_content">
      <h3>{$LANG.settings.title_offline}</h3>
      <fieldset>
         <legend>{$LANG.settings.title_offline}</legend>
         <div><label for="offline">{$LANG.settings.offline_enable}</label><span><select name="config[offline]" id="offline" class="textbox">
            {foreach from=$OPT_OFFLINE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.offline_message}</legend>
         <textarea name="config[offline_content]" id="offline_content" class="textbox fck">{$CONFIG.offline_content}</textarea>
      </fieldset>
   </div>
   <div id="Logos" class="tab_content">
      <h3>{$LANG.settings.title_logo}</h3>
      {if isset($LOGOS)}
      <fieldset>
         <table width="100%">
         <thead>
         <tr>
         <td>
         {$LANG.common.status}
         </td>
         <td>{$LANG.common.logo}</td>
         <td>{$LANG.module.scope}</td>
         <td>{$LANG.form.action}</td>
         </tr>
         </thead>
         <tbody>
         {foreach from=$LOGOS item=logo}
         <tr>
            <td>
            <input type="hidden" name="logo[{$logo.logo_id}][status]" id="logo_{$logo.logo_id}_status" value="{$logo.status}" class="toggle">
            </td>
            <td>
           
            <a href="images/logos/{$logo.filename}" target="_blank" class="colorbox"><img src="images/logos/{$logo.filename}" alt="{$logo.filename}" height="50"></a>
            </td>
            <td>
               <input type="hidden" class="default-style" value="{$logo.style}">
               <select id="" name="logo[{$logo.logo_id}][skin]" class="textbox select-skin">
                  <optgroup label="Skins">
                     <option value="">{$LANG.settings.logo_all_skins}</option>
                     {foreach from=$SKINS_ALL item=skin}
                     {if isset($skin.other_optgroup) && $skin.other_optgroup}
                  </optgroup>
                  <optgroup label="{$LANG.common.other}">
                     {/if}
                     <option value="{$skin.name}" {if ($skin.name == $logo.skin)} selected="selected"{/if}>{$skin.display}</option>
                     {/foreach}
                  </optgroup>
               </select>
               <select id="" name="logo[{$logo.logo_id}][style]" class="textbox select-style">
                  <option value="">{$LANG.settings.logo_all_styles}</option>
               </select>
               
            </td>
            <td>
<a href="{$logo.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><i class="fa fa-trash" title="{$LANG.common.delete}"></i></a>
            </td>
         </tr>
         {/foreach}
         </tbody>
         </table>
      </fieldset>
      {/if}
      <fieldset>
         <legend>{$LANG.settings.title_logo_upload}</legend>
         <div><input type="file" name="logo" class="multiple"></div>
      </fieldset>
   </div>
   <div id="Advanced_Settings" class="tab_content">
      <h3>{$LANG.settings.title_advanced}</h3>
      <fieldset>
         <legend>{$LANG.common.email}</legend>
         <div><label for="email_method">{$LANG.settings.email_method}</label><span><select name="config[email_method]" id="email_method" class="textbox">
            {foreach from=$OPT_EMAIL_METHOD item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="email_name">{$LANG.settings.email_sender_name}</label><span><input name="config[email_name]" id="email_name" type="text" class="textbox" value="{$CONFIG.email_name}"></span></div>
         <div><label for="email_address">{$LANG.settings.email_sender_address}</label><span><input name="config[email_address]" id="email_address" type="text" class="textbox" value="{$CONFIG.email_address}"></span></div>
         <div><label for="email_smtp_host">{$LANG.settings.smtp_host}</label><span><input name="config[email_smtp_host]" id="email_smtp_host" type="text" class="textbox" value="{$CONFIG.email_smtp_host}"></span></div>
         <div><label for="email_smtp_port">{$LANG.settings.smtp_port}</label><span><input name="config[email_smtp_port]" id="email_smtp_port" type="text" class="textbox number" value="{$CONFIG.email_smtp_port}"></span></div>
         <div><label for="email_smtp">{$LANG.settings.smtp_auth}</label><span><select name="config[email_smtp]" id="email_smtp" class="textbox" autocomplete="off">
            {foreach from=$OPT_EMAIL_SMTP item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="email_smtp_user">{$LANG.settings.smtp_user}</label><span><input name="config[email_smtp_user]" id="email_smtp_user" type="text" class="textbox" value="{$CONFIG.email_smtp_user}" autocomplete="off"></span></div>
         <div><label for="email_smtp_password">{$LANG.settings.smtp_pass}</label><span><input name="config[email_smtp_password]" id="email_smtp_password" type="password" class="textbox" value="{$CONFIG.email_smtp_password}" autocomplete="off"></span></div>
         <div><label for="smtp_test_url">&nbsp;</label><span>
         <button type="button" class="button" id="smtp_test" onclick="$.colorbox({ href:'{$STORE_URL}/{$SKIN_VARS.admin_file}?_g=xml&amp;function=SMTPTest' })">{$LANG.common.test} ({$LANG.common.after_save})</button>
</span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_performance}</legend>
         <div><label for="debug">{$LANG.settings.debug_enable}</label><span><select name="config[debug]" id="debug" class="textbox">
            {foreach from=$OPT_DEBUG item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="debug">{$LANG.settings.debug_ip_addresses}</label><span><input name="config[debug_ip_addresses]" id="debug_ip_addresses" type="text" class="textbox" value="{$CONFIG.debug_ip_addresses}"></span></div>
         <div><label for="cache">{$LANG.settings.cache_enable}</label><span><select name="config[cache]" id="cache" class="textbox">
     {foreach from=$OPT_CACHE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
   </select></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_proxy}</legend>
         <div><label for="proxy">{$LANG.settings.proxy_enable}</label><span><select name="config[proxy]" id="proxy" class="textbox">
            {foreach from=$OPT_PROXY item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="proxy_host">{$LANG.settings.proxy_host}</label><span><input name="config[proxy_host]" id="proxy_host" type="text" class="textbox" value="{$CONFIG.proxy_host}"></span></div>
         <div><label for="proxy_port">{$LANG.settings.proxy_port}</label><span><input name="config[proxy_port]" id="proxy_port" type="text" class="textbox number" value="{$CONFIG.proxy_port}"></span></div>
      </fieldset>
      <fieldset>
         <legend>{$LANG.settings.title_time_date}</legend>
         <div><label for="fuzzy_time_format">{$LANG.settings.fuzzy_time_format}</label><span><input name="config[fuzzy_time_format]" id="fuzzy_time_format" type="text" class="textbox" value="{$CONFIG.fuzzy_time_format}"> PHP <a href="http://www.php.net/strftime" target="_blank">strftime</a></span></div>
         <div><label for="time_format">{$LANG.settings.time_format}</label><span><input name="config[time_format]" id="time_format" type="text" class="textbox" value="{$CONFIG.time_format}"> PHP <a href="http://www.php.net/strftime" target="_blank">strftime</a></span></div>
         <div><label for="dispatch_date_format">{$LANG.settings.dispatch_date_format}</label><span><input name="config[dispatch_date_format]" id="dispatch_date_format" type="text" class="textbox" value="{if ($CONFIG.dispatch_date_format)}{$CONFIG.dispatch_date_format}{else}%b %d %Y{/if}"> PHP <a href="http://www.php.net/strftime" target="_blank">strftime</a></span></div>
         <div><label for="time_offset">{$LANG.settings.time_utc_offset}</label><span><input name="config[time_offset]" id="time_offset" type="text" class="textbox number" value="{$CONFIG.time_offset}"></span></div>
         {if isset($TIMEZONES)}
         <div><label for="time_zone">{$LANG.settings.time_zone}</label><span><select name="config[time_zone]" id="time_zone" type="text" class="textbox">
            {foreach from=$TIMEZONES item=timezone}<option value="{$timezone.zone}"{$timezone.selected}>{$timezone.zone}</option>{/foreach}
            </select></span>
         </div>
         {/if}
      </fieldset>
      <fieldset>
         <legend>{$LANG.common.other}</legend>
         <div><label for="feed_access_key">{$LANG.settings.feed_access_key}</label><span><input name="config[feed_access_key]" id="feed_access_key" type="text" class="textbox" value="{$CONFIG.feed_access_key}"></span></div>
      </fieldset>
   </div>
   <div id="Copyright" class="tab_content">
      <h3>{$LANG.settings.title_copyright}</h3>
      <fieldset>
         <div><span><textarea name="config[store_copyright]" id="copyright_content" class="textbox fck">{$CONFIG.store_copyright}</textarea></span></div>
      </fieldset>
   </div>
   <div id="Extra" class="tab_content">
      <h3>{$LANG.settings.title_extra}</h3>
 <!-- Start SEMPER FI SCRIPTURES -->
      <fieldset><legend>{$LANG.scriptures.admin_settings_title} (Custom) - Modification created and developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></legend>
		<div><label for="sfws_scriptures_footer_status">{$LANG.scriptures.admin_settings_field_footer_status}</label><span><select name="config[sfws_scriptures_footer_status]" id="sfws_scriptures_footer_status" class="textbox">
		  {foreach from=$OPT_SFWS_SCRIPTURES_SIDEBOX_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_scriptures_sidebox_status">{$LANG.scriptures.admin_settings_field_sidebox_status}</label><span><select name="config[sfws_scriptures_sidebox_status]" id="sfws_scriptures_sidebox_status" class="textbox">
		  {foreach from=$OPT_SFWS_SCRIPTURES_SIDEBOX_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
      </fieldset>
      <!-- End SEMPER FI SCRIPTURES -->
<!-- SEMPER FI TESTIMONIALS MODIFICATION -->
      <fieldset><legend>{$LANG.testimonials.admin_settings_title} (2.0) - Modification created and developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></legend>
        <div><label for="sfws_testimonials_add_status">{$LANG.testimonials.admin_settings_field_add_status}</label><span><select name="config[sfws_testimonials_add_status]" id="sfws_testimonials_add_status" class="textbox">
        {foreach from=$OPT_SFWS_TESTIMONIALS_ADD_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
        </select></span></div>
        <div><label for="sfws_testimonials_add_seo_browser_title">{$LANG.testimonials.admin_settings_field_add_seo_browser_title}</label><span><input name="config[sfws_testimonials_add_seo_browser_title]" id="sfws_testimonials_add_seo_browser_title" type="text" class="textbox" value="{$CONFIG.sfws_testimonials_add_seo_browser_title}"></span></div>
        <div><label for="sfws_testimonials_add_seo_meta_description">{$LANG.testimonials.admin_settings_field_add_seo_meta_description}</label><span><textarea name="config[sfws_testimonials_add_seo_meta_description]" id="sfws_testimonials_add_seo_meta_description" class="textbox">{$CONFIG.sfws_testimonials_add_seo_meta_description}</textarea></span></div>
        <div><label for="sfws_testimonials_add_seo_meta_keywords">{$LANG.testimonials.admin_settings_field_add_seo_meta_keywords}</label><span><textarea name="config[sfws_testimonials_add_seo_meta_keywords]" id="sfws_testimonials_add_seo_meta_keywords" class="textbox">{$CONFIG.sfws_testimonials_add_seo_meta_keywords}</textarea></span></div>	
        <div><label for="sfws_testimonials_page_status">{$LANG.testimonials.admin_settings_field_page_status}</label><span><select name="config[sfws_testimonials_page_status]" id="sfws_testimonials_page_status" class="textbox">
        {foreach from=$OPT_SFWS_TESTIMONIALS_PAGE_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
        </select></span></div>
        <div><label for="sfws_testimonials_page_pagination">{$LANG.testimonials.admin_settings_field_page_pagination}</label><span><select name="config[sfws_testimonials_page_pagination]" id="sfws_testimonials_page_pagination" class="textbox">
        {foreach from=$OPT_SFWS_TESTIMONIALS_PAGE_PAGINATION item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
        </select></span></div>
        <div><label for="sfws_testimonials_page_amount">{$LANG.testimonials.admin_settings_field_page_amount}</label><span><input name="config[sfws_testimonials_page_amount]" id="sfws_testimonials_page_amount" type="text" class="textbox number" value="{$CONFIG.sfws_testimonials_page_amount}" /> (numeric, e.g. 20)</span></div>
        <div><label for="sfws_testimonials_page_seo_browser_title">{$LANG.testimonials.admin_settings_field_page_seo_browser_title}</label><span><input name="config[sfws_testimonials_page_seo_browser_title]" id="sfws_testimonials_page_seo_browser_title" type="text" class="textbox" value="{$CONFIG.sfws_testimonials_page_seo_browser_title}"></span></div>
        <div><label for="sfws_testimonials_page_seo_meta_description">{$LANG.testimonials.admin_settings_field_page_seo_meta_description}</label><span><textarea name="config[sfws_testimonials_page_seo_meta_description]" id="sfws_testimonials_page_seo_meta_description" class="textbox">{$CONFIG.sfws_testimonials_page_seo_meta_description}</textarea></span></div>
        <div><label for="sfws_testimonials_page_seo_meta_keywords">{$LANG.testimonials.admin_settings_field_page_seo_meta_keywords}</label><span><textarea name="config[sfws_testimonials_page_seo_meta_keywords]" id="sfws_testimonials_page_seo_meta_keywords" class="textbox">{$CONFIG.sfws_testimonials_page_seo_meta_keywords}</textarea></span></div>		
        <div><label for="sfws_testimonials_sidebox_status">{$LANG.testimonials.admin_settings_field_sidebox_status}</label><span><select name="config[sfws_testimonials_sidebox_status]" id="sfws_testimonials_sidebox_status" class="textbox">
        {foreach from=$OPT_SFWS_TESTIMONIALS_SIDEBOX_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
        </select></span></div>
        <div><label for="sfws_testimonials_sidebox_character_length">{$LANG.testimonials.admin_settings_field_sidebox_character_length}</label><span><input name="config[sfws_testimonials_sidebox_character_length]" id="sfws_testimonials_sidebox_character_length" type="text" class="textbox number" value="{$CONFIG.sfws_testimonials_sidebox_character_length}" /> (numeric, e.g. 300)</span></div>
      </fieldset>
<!-- END SEMPERFI TESTIMONIALS MODIFICATION -->
      <!-- Start SemperFi ASKABOUT Modification -->
      <fieldset><legend>{$LANG.askaboutaproduct.admin_settings_title} (Custom) - Modification created and developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></legend>
		<div><label for="ask_about_a_product_status">{$LANG.askaboutaproduct.admin_settings_status}</label><span><select name="config[ask_about_a_product_status]" id="ask_about_a_product_status" class="textbox">
		{foreach from=$OPT_ASK_ABOUT_A_PRODUCT_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="ask_about_a_product_departments">{$LANG.askaboutaproduct.admin_settings_departments}</label><span><select name="config[ask_about_a_product_departments]" id="ask_about_a_product_departments" class="textbox">
		{foreach from=$OPT_ASK_ABOUT_A_PRODUCT_DEPARTMENTS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
      </fieldset>
      <!-- End SemperFi ASKABOUT Modification -->
      <!-- Start SemperFi CONTENT SLIDER Modification -->
      <fieldset><legend>{$LANG.content_slider.admin_settings_title} (1.0) - Modification created and developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></legend>
		<div><label for="sfws_content_slider_status">{$LANG.content_slider.admin_settings_field_status}</label><span><select name="config[sfws_content_slider_status]" id="sfws_content_slider_status" class="textbox">
		  {foreach from=$OPT_SFWS_CONTENT_SLIDER_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select> {$LANG.content_slider.admin_settings_field_status_description}</span></div>
		<div><label for="sfws_content_slider_display_location">{$LANG.content_slider.admin_settings_field_display_location}</label><span><select name="config[sfws_content_slider_display_location]" id="sfws_content_slider_display_location" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DISPLAY_LOCATION_OPTIONS item=sfws_content_slider_display_location_option}<option value="{$sfws_content_slider_display_location_option.value}"{$sfws_content_slider_display_location_option.selected}>{$sfws_content_slider_display_location_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_display_location_description}</div>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_auto_slide}</legend>
		<div><label for="sfws_content_slider_auto_slide">{$LANG.content_slider.admin_settings_field_auto_slide}</label><span><select name="config[sfws_content_slider_auto_slide]" id="sfws_content_slider_auto_slide" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_AUTO_SLIDE_OPTIONS item=sfws_content_slider_auto_slide_option}<option value="{$sfws_content_slider_auto_slide_option.value}"{$sfws_content_slider_auto_slide_option.selected}>{$sfws_content_slider_auto_slide_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_auto_slide_description}</div>
		<div><label for="sfws_content_slider_auto_slide_direction">{$LANG.content_slider.admin_settings_field_auto_slide_direction}</label><span><select name="config[sfws_content_slider_auto_slide_direction]" id="sfws_content_slider_auto_slide_direction" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_AUTO_SLIDE_DIRECTION_OPTIONS item=sfws_content_slider_auto_slide_direction_option}<option value="{$sfws_content_slider_auto_slide_direction_option.value}"{$sfws_content_slider_auto_slide_direction_option.selected}>{$sfws_content_slider_auto_slide_direction_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_auto_slide_direction_description}</div>
		<div><label for="sfws_content_slider_auto_slide_interval">{$LANG.content_slider.admin_settings_field_auto_slide_interval}</label><span><input name="config[sfws_content_slider_auto_slide_interval]" id="sfws_content_slider_auto_slide_interval" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_auto_slide_interval}" /> </span> {$LANG.content_slider.admin_settings_field_auto_slide_interval_description}</div>
		<div><label for="sfws_content_slider_force_auto_slide">{$LANG.content_slider.admin_settings_field_auto_slide_force}</label><span><select name="config[sfws_content_slider_force_auto_slide]" id="sfws_content_slider_force_auto_slide" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_FORCE_AUTO_SLIDE_OPTIONS item=sfws_content_slider_force_auto_slide_option}<option value="{$sfws_content_slider_force_auto_slide_option.value}"{$sfws_content_slider_force_auto_slide_option.selected}>{$sfws_content_slider_force_auto_slide_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_auto_slide_force_description}</div>
		<div><label for="sfws_content_slider_pause_on_hover">{$LANG.content_slider.admin_settings_field_auto_slide_pause_on_hover}</label><span><select name="config[sfws_content_slider_pause_on_hover]" id="sfws_content_slider_pause_on_hover" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_PAUSE_ON_HOVER_OPTIONS item=sfws_content_slider_pause_on_hover_option}<option value="{$sfws_content_slider_pause_on_hover_option.value}"{$sfws_content_slider_pause_on_hover_option.selected}>{$sfws_content_slider_pause_on_hover_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_auto_slide_pause_on_hover_description}</div>
		</fieldset>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_height_options}</legend>
		<div><label for="sfws_content_slider_auto_height">{$LANG.content_slider.admin_settings_field_auto_height}</label><span><select name="config[sfws_content_slider_auto_height]" id="sfws_content_slider_auto_height" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_AUTO_HEIGHT_OPTIONS item=sfws_content_slider_auto_height_option}<option value="{$sfws_content_slider_auto_height_option.value}"{$sfws_content_slider_auto_height_option.selected}>{$sfws_content_slider_auto_height_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_auto_height_description}</div>
		<div><label for="sfws_content_slider_height_ease_duration">{$LANG.content_slider.admin_settings_field_height_ease_duration}</label><span><input name="config[sfws_content_slider_height_ease_duration]" id="sfws_content_slider_height_ease_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_height_ease_duration}" /> </span> {$LANG.content_slider.admin_settings_field_height_ease_duration_description}</div>
		<div><label for="sfws_content_slider_height_ease_function">{$LANG.content_slider.admin_settings_field_height_ease_function}</label><span><select name="config[sfws_content_slider_height_ease_function]" id="sfws_content_slider_height_ease_function" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_HEIGHT_EASE_FUNCTION_OPTIONS item=sfws_content_slider_height_ease_function_option}<option value="{$sfws_content_slider_height_ease_function_option.value}"{$sfws_content_slider_height_ease_function_option.selected}>{$sfws_content_slider_height_ease_function_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_height_ease_function_description}</div>
		</fieldset>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_sliding_options}</legend>
		<div><label for="sfws_content_slider_slide_ease_duration">{$LANG.content_slider.admin_settings_field_slide_ease_duration}</label><span><input name="config[sfws_content_slider_slide_ease_duration]" id="sfws_content_slider_slide_ease_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_slide_ease_duration}" /> </span> {$LANG.content_slider.admin_settings_field_slide_ease_duration_description}</div>
		<div><label for="sfws_content_slider_slide_ease_function">{$LANG.content_slider.admin_settings_field_slide_ease_function}</label><span><select name="config[sfws_content_slider_slide_ease_function]" id="sfws_content_slider_slide_ease_function" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_SLIDE_EASE_FUNCTION_OPTIONS item=sfws_content_slider_slide_ease_function_option}<option value="{$sfws_content_slider_slide_ease_function_option.value}"{$sfws_content_slider_slide_ease_function_option.selected}>{$sfws_content_slider_slide_ease_function_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_slide_ease_function_description}</div>
		<div><label for="sfws_content_slider_fade_in_duration">{$LANG.content_slider.admin_settings_field_fade_in_duration}</label><span><input name="config[sfws_content_slider_fade_in_duration]" id="sfws_content_slider_fade_in_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_fade_in_duration}" /> </span> {$LANG.content_slider.admin_settings_field_fade_in_duration_description}</div>
		<div><label for="sfws_content_slider_fade_out_duration">{$LANG.content_slider.admin_settings_field_fade_out_duration}</label><span><input name="config[sfws_content_slider_fade_out_duration]" id="sfws_content_slider_fade_out_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_fade_out_duration}" /> </span> {$LANG.content_slider.admin_settings_field_fade_out_duration_description}</div>
		</fieldset>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_dynamic_arrows}</legend>
		<div><label for="sfws_content_slider_dynamic_arrows">{$LANG.content_slider.admin_settings_field_dynamic_arrows}</label><span><select name="config[sfws_content_slider_dynamic_arrows]" id="sfws_content_slider_dynamic_arrows" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DYNAMIC_ARROWS_OPTIONS item=sfws_content_slider_dynamic_arrows_option}<option value="{$sfws_content_slider_dynamic_arrows_option.value}"{$sfws_content_slider_dynamic_arrows_option.selected}>{$sfws_content_slider_dynamic_arrows_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_dynamic_arrows_description}</div>
		<div><label for="sfws_content_slider_dynamic_arrows_graphical">{$LANG.content_slider.admin_settings_field_dynamic_arrows_graphical}</label><span><select name="config[sfws_content_slider_dynamic_arrows_graphical]" id="sfws_content_slider_dynamic_arrows_graphical" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DYNAMIC_ARROWS_GRAPHICAL_OPTIONS item=sfws_content_slider_dynamic_arrows_graphical_option}<option value="{$sfws_content_slider_dynamic_arrows_graphical_option.value}"{$sfws_content_slider_dynamic_arrows_graphical_option.selected}>{$sfws_content_slider_dynamic_arrows_graphical_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_dynamic_arrows_graphical_description}</div>
		<div><label for="sfws_content_slider_dynamic_arrow_left_text">{$LANG.content_slider.admin_settings_field_dynamic_arrow_left_text}</label><span><input name="config[sfws_content_slider_dynamic_arrow_left_text]" id="sfws_content_slider_dynamic_arrow_left_text" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_dynamic_arrow_left_text}" /> </span> {$LANG.content_slider.admin_settings_field_dynamic_arrow_left_text_description}</div>
		<div><label for="sfws_content_slider_dynamic_arrow_right_text">{$LANG.content_slider.admin_settings_field_dynamic_arrow_right_text}</label><span><input name="config[sfws_content_slider_dynamic_arrow_right_text]" id="sfws_content_slider_dynamic_arrow_right_text" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_dynamic_arrow_right_text}" /> </span> {$LANG.content_slider.admin_settings_field_dynamic_arrow_right_text_description}</div>
		<div><label for="sfws_content_slider_hide_side_arrows">{$LANG.content_slider.admin_settings_field_hide_side_arrows}</label><span><select name="config[sfws_content_slider_hide_side_arrows]" id="sfws_content_slider_hide_side_arrows" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_HIDE_SIDE_ARROWS_OPTIONS item=sfws_content_slider_hide_side_arrows_option}<option value="{$sfws_content_slider_hide_side_arrows_option.value}"{$sfws_content_slider_hide_side_arrows_option.selected}>{$sfws_content_slider_hide_side_arrows_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_hide_side_arrows_description}</div>
		<div><label for="sfws_content_slider_hide_side_arrows_duration">{$LANG.content_slider.admin_settings_field_hide_side_arrows_duration}</label><span><input name="config[sfws_content_slider_hide_side_arrows_duration]" id="sfws_content_slider_hide_side_arrows_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_hide_side_arrows_duration}" /> </span> {$LANG.content_slider.admin_settings_field_hide_side_arrows_duration_description}</div>
		<div><label for="sfws_content_slider_hover_arrows">{$LANG.content_slider.admin_settings_field_hover_arrows}</label><span><select name="config[sfws_content_slider_hover_arrows]" id="sfws_content_slider_hover_arrows" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_HOVER_ARROWS_OPTIONS item=sfws_content_slider_hover_arrows_option}<option value="{$sfws_content_slider_hover_arrows_option.value}"{$sfws_content_slider_hover_arrows_option.selected}>{$sfws_content_slider_hover_arrows_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_hover_arrows_description}</div>
		<div><label for="sfws_content_slider_hover_arrows_duration">{$LANG.content_slider.admin_settings_field_hover_arrows_duration}</label><span><input name="config[sfws_content_slider_hover_arrows_duration]" id="sfws_content_slider_hover_arrows_duration" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_hover_arrows_duration}" /> </span> {$LANG.content_slider.admin_settings_field_hover_arrows_duration_description}</div>
		</fieldset>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_dynamic_tabs}</legend>
		<div><label for="sfws_content_slider_dynamic_tabs">{$LANG.content_slider.admin_settings_field_dynamic_tabs}</label><span><select name="config[sfws_content_slider_dynamic_tabs]" id="sfws_content_slider_dynamic_tabs" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DYNAMIC_TABS_OPTIONS item=sfws_content_slider_dynamic_tabs_option}<option value="{$sfws_content_slider_dynamic_tabs_option.value}"{$sfws_content_slider_dynamic_tabs_option.selected}>{$sfws_content_slider_dynamic_tabs_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_dynamic_tabs_description}</div>
		<div><label for="sfws_content_slider_dynamic_tabs_align">{$LANG.content_slider.admin_settings_field_dynamic_tabs_align}</label><span><select name="config[sfws_content_slider_dynamic_tabs_align]" id="sfws_content_slider_dynamic_tabs_align" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DYNAMIC_TABS_ALIGN_OPTIONS item=sfws_content_slider_dynamic_tabs_align_option}<option value="{$sfws_content_slider_dynamic_tabs_align_option.value}"{$sfws_content_slider_dynamic_tabs_align_option.selected}>{$sfws_content_slider_dynamic_tabs_align_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_dynamic_tabs_align_description}</div>
		<div><label for="sfws_content_slider_dynamic_tabs_position">{$LANG.content_slider.admin_settings_field_dynamic_tabs_position}</label><span><select name="config[sfws_content_slider_dynamic_tabs_position]" id="sfws_content_slider_dynamic_tabs_position" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_DYNAMIC_TABS_POSITION_OPTIONS item=sfws_content_slider_dynamic_tabs_position_option}<option value="{$sfws_content_slider_dynamic_tabs_position_option.value}"{$sfws_content_slider_dynamic_tabs_position_option.selected}>{$sfws_content_slider_dynamic_tabs_position_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_dynamic_tabs_position_description}</div>
		<div><label for="sfws_content_slider_include_title">{$LANG.content_slider.admin_settings_field_include_title}</label><span><select name="config[sfws_content_slider_include_title]" id="sfws_content_slider_include_title" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_INCLUDE_TITLE_OPTIONS item=sfws_content_slider_include_title_option}<option value="{$sfws_content_slider_include_title_option.value}"{$sfws_content_slider_include_title_option.selected}>{$sfws_content_slider_include_title_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_include_title_description}</div>
		</fieldset>
		<fieldset style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><legend>{$LANG.content_slider.admin_settings_section_responsive_settings}</legend>
		<div><label for="sfws_content_slider_responsive">{$LANG.content_slider.admin_settings_field_responsive}</label><span><select name="config[sfws_content_slider_responsive]" id="sfws_content_slider_responsive" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_RESPONSIVE_OPTIONS item=sfws_content_slider_responsive_option}<option value="{$sfws_content_slider_responsive_option.value}"{$sfws_content_slider_responsive_option.selected}>{$sfws_content_slider_responsive_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_responsive_description}</div>
		<div><label for="sfws_content_slider_mobile_navigation">{$LANG.content_slider.admin_settings_field_mobile_navigation}</label><span><select name="config[sfws_content_slider_mobile_navigation]" id="sfws_content_slider_mobile_navigation" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_MOBILE_NAVIGATION_OPTIONS item=sfws_content_slider_mobile_navigation_option}<option value="{$sfws_content_slider_mobile_navigation_option.value}"{$sfws_content_slider_mobile_navigation_option.selected}>{$sfws_content_slider_mobile_navigation_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_mobile_navigation_description}</div>
		<div><label for="sfws_content_slider_mobile_nav_default_text">{$LANG.content_slider.admin_settings_field_mobile_navigation_text}</label><span><input name="config[sfws_content_slider_mobile_nav_default_text]" id="sfws_content_slider_mobile_nav_default_text" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_mobile_nav_default_text}" /> </span> {$LANG.content_slider.admin_settings_field_mobile_navigation_text_description}</div>
		<div><label for="sfws_content_slider_hide_arrows_when_mobile">{$LANG.content_slider.admin_settings_field_hide_arrows_when_mobile}</label><span><select name="config[sfws_content_slider_hide_arrows_when_mobile]" id="sfws_content_slider_hide_arrows_when_mobile" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_HIDE_ARROWS_WHEN_MOBILE_OPTIONS item=sfws_content_slider_hide_arrows_when_mobile_option}<option value="{$sfws_content_slider_hide_arrows_when_mobile_option.value}"{$sfws_content_slider_hide_arrows_when_mobile_option.selected}>{$sfws_content_slider_hide_arrows_when_mobile_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_hide_arrows_when_mobile_description}</div>
		<div><label for="sfws_content_slider_hide_arrows_threshold">{$LANG.content_slider.admin_settings_field_hide_arrows_threshold}</label><span><input name="config[sfws_content_slider_hide_arrows_threshold]" id="sfws_content_slider_hide_arrows_threshold" type="text" class="textbox" value="{$CONFIG.sfws_content_slider_hide_arrows_threshold}" /> </span> {$LANG.content_slider.admin_settings_field_hide_arrows_threshold_description}</div>
		<div><label for="sfws_content_slider_swipe">{$LANG.content_slider.admin_settings_field_swipe}</label><span><select name="config[sfws_content_slider_swipe]" id="sfws_content_slider_swipe" class="textbox">
		  {foreach from=$SFWS_CONTENT_SLIDER_SWIPE_OPTIONS item=sfws_content_slider_swipe_option}<option value="{$sfws_content_slider_swipe_option.value}"{$sfws_content_slider_swipe_option.selected}>{$sfws_content_slider_swipe_option.name}</option>{/foreach}
		</select></span> {$LANG.content_slider.admin_settings_field_swipe_description}</div>
		</fieldset>
	  </fieldset>
	  <!-- End SemperFi CONTENT SLIDER Modification -->

	  <!-- Start SemperFi DOCUMENT MANAGER Modificaation -->
	  <fieldset><legend>Site Document Manager CC6 (1.0) - Modification created and developed by <a href="http://www.semperfiwebservices.com/index.php" title="SemperFiWebServices" alt="SemperFiWebServices" target="_blank">SemperFiWebServices</a></legend>
		<div><label for="sfws_site_doc_manager_status">Status:</label><span><select name="config[sfws_site_doc_manager_status]" id="sfws_site_doc_manager_status" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select> (if disabled standard site docs are used)</span></div>
		<div><label for="sfws_site_doc_manager_status_header">Header Status:</label><span><select name="config[sfws_site_doc_manager_status_header]" id="sfws_site_doc_manager_status_header" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_HEADER item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_site_doc_manager_status_footer">Footer Status:</label><span><select name="config[sfws_site_doc_manager_status_footer]" id="sfws_site_doc_manager_status_footer" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_FOOTER item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_site_doc_manager_status_sidebox1">Side Box 1 Status:</label><span><select name="config[sfws_site_doc_manager_status_sidebox1]" id="sfws_site_doc_manager_status_sidebox1" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_SIDEBOX1 item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_site_doc_manager_status_sidebox2">Side Box 2 Status:</label><span><select name="config[sfws_site_doc_manager_status_sidebox2]" id="sfws_site_doc_manager_status_sidebox2" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_SIDEBOX2 item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_site_doc_manager_status_products">Product Pages Status:</label><span><select name="config[sfws_site_doc_manager_status_products]" id="sfws_site_doc_manager_status_products" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_PRODUCTS item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
		<div><label for="sfws_site_doc_manager_status_categories">Category Pages Status:</label><span><select name="config[sfws_site_doc_manager_status_categories]" id="sfws_site_doc_manager_status_categories" class="textbox">
		  {foreach from=$OPT_SFWS_SITE_DOC_MANAGER_STATUS_CATEGORIES item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
		</select></span></div>
	  </fieldset>
	  <!-- End SemperFi DOCUMENT MANAGER Modificaation -->
      <fieldset>
         <legend>{$LANG.settings.title_product_clone}</legend>
         <div><label for="product_clone">{$LANG.common.status}</label><span><select name="config[product_clone]" id="product_clone" class="textbox">
            {foreach from=$OPT_PRODUCT_CLONE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="product_clone_images">{$LANG.settings.product_clone_images}</label><span><input name="config[product_clone_images]" id="product_clone_images" type="hidden" class="toggle" value="{$CONFIG.product_clone_images}"></span></div>
         <div><label for="product_clone_options">{$LANG.settings.product_clone_options}</label><span><input name="config[product_clone_options]" id="product_clone_options" type="hidden" class="toggle" value="{$CONFIG.product_clone_options}"></span></div>
         <div><label for="product_clone_options_matrix">{$LANG.settings.product_clone_options_matrix}</label><span><input name="config[product_clone_options_matrix]" id="product_clone_options_matrix" type="hidden" class="toggle" value="{$CONFIG.product_clone_options_matrix}"></span></div>
         <div><label for="product_clone_acats">{$LANG.settings.product_clone_acats}</label><span><input name="config[product_clone_acats]" id="product_clone_acats" type="hidden" class="toggle" value="{$CONFIG.product_clone_acats}"></span></div>
         <div><label for="product_clone_code">{$LANG.settings.product_clone_code}</label><span><select name="config[product_clone_code]" id="product_clone_code" class="textbox">
            {foreach from=$OPT_PRODUCT_CLONE_CODE item=option}<option value="{$option.value}"{$option.selected}>{$option.title}</option>{/foreach}
            </select></span>
         </div>
         <div><label for="product_clone_translations">{$LANG.settings.product_clone_translations}</label><span><input name="config[product_clone_translations]" id="product_clone_translations" type="hidden" class="toggle" value="{$CONFIG.product_clone_translations}"></span></div>
         <div><label for="product_clone_redirect">{$LANG.settings.product_clone_redirect}</label><span><input name="config[product_clone_redirect]" id="product_clone_redirect" type="hidden" class="toggle" value="{$CONFIG.product_clone_redirect}"></span></div>
      </fieldset>
   </div>
   {include file='templates/element.hook_form_content.php'}
   <div class="form_control">
      <input type="hidden" name="config[bftime]" value="600">
      <input type="hidden" name="config[bfattempts]" value="5">
      <input id="submit" type="submit" class="button" value="{$LANG.common.save}">
      <input type="hidden" name="previous-tab" id="previous-tab" value="">
   </div>
   <input type="hidden" name="token" value="{$SESSION_TOKEN}">
</form>
<script type="text/javascript">
   {if $VAL_JSON_COUNTY} var county_list = {$VAL_JSON_COUNTY};{/if}
   {if $JSON_STYLES}var json_skins	= {$JSON_STYLES};{/if}
</script>