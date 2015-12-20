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
{if isset($DOCUMENT)}
<div id="content_homepage">
   <center><h1>{$DOCUMENT.title}</h1></center>
   {$DOCUMENT.content}
</div>
{/if}

{if $LATEST_PRODUCTS}
<div id="content_latest_products">
   <h2>{$LANG.catalogue.latest_products}</h2>
   <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3" data-equalizer>
      {foreach from=$LATEST_PRODUCTS item=product}
{*BSMITHER ADDED LINE BELOW TO SHOW ONLY IN-STOCK ITEMS*}
{if $product.stock_level lt 1}{continue}{/if}
      <li>
         <form action="{$VAL_SELF}" method="post" class="panel add_to_basket">
            <div data-equalizer-watch>
               <div class="text-center">
                  <a class="th" href="{$product.url}" title="{$product.name}"><img src="{$product.image}" alt="{$product.name}"></a>
               </div>
<h4><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h4>  
               {if $product.review_score && $CTRL_REVIEW}
               <div class="rating"> {for $i = 1; $i <= 5; $i++}
                  {if $product.review_score >= $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt=""> {elseif $product.review_score > ($i - 1) && $product.review_score < $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt=""> {else} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt=""> {/if}
                  {/for} 
               </div>
               {/if}
            </div>
<h4>
            {if $product.ctrl_sale}
            <span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
            {else}
<span class= "regular_price">{$product.price}</span>
            {/if}
</h4>
            {if $product.available == '0'}
            <div class="row collapse marg-top">
               <div class="small-12 columns">
                  <input type="submit" value="{$LANG.common.unavailable}" class="button small disabled postfix expand" disabled>
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
                  <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" class="button small postfix disabled expand marg-top" disabled>
               </div>
            </div>
            {/if}
            <input type="hidden" name="add" value="{$product.product_id}">
         </form>
      </li>
      {/foreach}
   </ul>
</div>
{/if}

   <!-- {$HOMEPAGE_SALE_ITEMS}  -->