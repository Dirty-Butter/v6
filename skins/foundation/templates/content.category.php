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
<h2>{$category.cat_name}</h2>
{* SEMPER FI DOCUMENT MENU FOR SMALL *}
{if isset($DOCUMENTS_CATEGORY) && count($DOCUMENTS_CATEGORY) > 0}
<div class="row" style="margin-bottom: 10px;">
  <div class="small-12 columns">
    {foreach from=$DOCUMENTS_CATEGORY item=document}
      <a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a><br />
    {/foreach}
</div>
  {* END SEMPER FI DOCUMENT MENU FOR SMALL *}
</div>
{/if}
<span class="redbold">Sold? We'll Help You Find It!</span>
{if isset($SUBCATS) && $SUBCATS}
<ul class="medium-block-grid-4 text-center{if $CONFIG.catalogue_expand_tree ==1} show-for-medium-up{else} small-block-grid-2{/if}" data-equalizer>
   {foreach from=$SUBCATS item=subcat}
   <li data-equalizer-watch>
      <a href="{$subcat.url}" title="{$subcat.cat_name}">
      <img class="th" src="{$subcat.cat_image}" alt="{$subcat.cat_name}">
      </a>
<br>
      <a href="{$subcat.url}" title="{$subcat.cat_name}"><small>{$subcat.cat_name}</small></a>
   </li>
   {/foreach}
</ul>
{/if}
{if $PRODUCTS}
<div class="row">
   <div class="small-12 medium-8 columns">
      {if isset($SORTING)}
      <form action="{$VAL_SELF}" class="autosubmit" method="post">
         <div class="row">
            <div class="small-3 medium-2 columns">
               <label for="product_sort">{$LANG.form.sort_by}</label>
            </div>
            <div class="small-9 medium-5 columns left">
               <select name="sort" id="product_sort">
                  <option value="" disabled>{$LANG.form.please_select}</option>
                  {foreach from=$SORTING item=sort}
                  <option value="{$sort.field}|{$sort.order}" {$sort.selected}>{$sort.name} ({$sort.direction})</option>
                  {/foreach}
               </select>
               <input type="submit" value="{$LANG.form.sort}" class="hide">
            </div>
         </div>
      </form>
      {/if}
   </div>
   <div class="medium-4 columns show-for-medium-up">
      <dl class="sub-nav right" id="layout_toggle">
         <dd><a href="#" class="grid_view"><i class="fa fa-th-large"></i></a></dd>
         <dd class="active"><a href="#" class="list_view"><i class="fa fa-th-list"></i></a></dd>
      </dl>
   </div>
</div>
{/if}
<div id="ccScroll">
   <ul class="small-block-grid-1 product_list" data-equalizer>
      {foreach from=$PRODUCTS item=product}
      <li>
         <form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
            <div class="row product_list_view">
               <div class="small-3 columns">
                  <a href="{$product.url}" title="{$product.name}">
                  <img class="th" src="{$product.thumbnail}" alt="{$product.name}">
                  </a>
               </div>
               <div class="small-6 columns center">
                  <h3>
                     <a href="{$product.url}" title="{$product.name}">{$product.name}</a> 
                  </h3>
                  {if $product.review_score}
                  <div>
                     {for $i = 1; $i <= 5; $i++}
                     {if $product.review_score >= $i}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="">
                     {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="">
                     {else}
                     <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="">
                     {/if}
                     {/for}
                  </div>
                <p class="rating-info">{$product.review_info}</p>
                     {/if}
              {*    {$product.description_short|strip_tags:true} *}
               </div>
               <div class="small-3 columns">
                  <h3>
                     {if $product.ctrl_sale}<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
                     {else}
				<span class= "regular_price">{$product.price}</span>
                     {/if}
                  </h3>
                  {if $product.available == '0'}
                  <div class="row collapse">
                     <div class="small-12 columns">
<a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.catalogue.out_of_stock_short}</a>
                     </div>
                  </div>
                  {elseif $product.ctrl_stock && !$CATALOGUE_MODE}
                  <div class="row collapse">
	               <div class="small-12 columns">
 <a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.common.info}</a>
                     </div>
                  </div>
                  {elseif !$CATALOGUE_MODE}
                  <div class="row collapse">
                     <div class="small-12 columns">
 <a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.catalogue.out_of_stock_short}</a>
                     </div>
                  </div>
                  {/if}
               </div>
            </div>
            <div class="product_grid_view hide">
               <div data-equalizer-watch>
                  <div class="text-center">
                     <a href="{$product.url}" title="{$product.name}"><img class="th" src="{$product.thumbnail}" alt="{$product.name}"></a>
                  </div>
<h3><a href="{$product.url}" title="{$product.name}">{$product.name} </a></h3>
                  {if $product.review_score}
                  <div class="rating">
                     <div>
                        {for $i = 1; $i <= 5; $i++}
                        {if $product.review_score >= $i}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="">
                        {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="">
                        {else}
                        <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="">
                        {/if}
                        {/for}
                     </div>
                     <p class="rating-info">{$product.review_info}</p>
                  </div>
                  {/if}
               </div>
<br>
               <h3>
                  {if $product.ctrl_sale}<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
                  {else}
                  {$product.price}
                  {/if}
               </h3>
	            
               
               {if $product.available == '0'}
               <div class="row collapse marg-top">
                  <div class="small-12 columns">
<a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.catalogue.out_of_stock_short}</a>
                  </div>
               </div>
               {elseif $product.ctrl_stock && !$CATALOGUE_MODE}
               <div class="row collapse marg-top">
                  <div class="small-12 columns ">
     <a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.common.info}</a> 

                  </div>
               </div>
                {elseif !$CATALOGUE_MODE}
               <div class="row collapse marg-top">
                  <div class="small-12 columns">
				 	          <a href="{$product.url}" title="{$product.name}" class="button small postfix">{$LANG.catalogue.out_of_stock_short}</a>
                  </div>
               </div>
               {/if}
            </div>
         </form>
      </li>
      {foreachelse}
      {if !isset($SUBCATS) || !$SUBCATS}
      <li>{$LANG.category.no_products}</li>
      {/if}
      {/foreach}
   </ul>
   {* Remove "hide" class for traditional pagination *}
   <div class="row hide">
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
   {* Add "hide" class to hide more button ajax load *}
   {if ($page < $total)}
   {$params[$var_name] = $page + 1}
   <a href="{$current}{http_build_query($params)}{$anchor}" class="button tiny expand" id="ccScroll-next">{$LANG.common.more} <i class="fa fa-angle-down"></i></a>
   {/if}
</div>
{if !empty($category.cat_desc)}
<div class="row">
   <div class="small-12 columns">{$category.cat_desc}</div>
</div>
{/if}
<div class="hide" id="lang_loading">{$LANG.common.loading}</div>