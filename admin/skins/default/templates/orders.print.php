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
<!DOCTYPE html>
<html xmlns="//www.w3.org/1999/xhtml">
<head>
  <title>{$PAGE_TITLE}</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="../{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/styles/print.css" media="screen,print">

</head>
<body onload="window.print();">
  {if isset($ORDER_LIST)}
  {foreach from=$ORDER_LIST item=order}
  
		  <div>
<br>
         <center><img src="{$STORE_LOGO}" alt="" /></center>
<br>
        </div>
{if !empty($order.note_to_customer)}
<center>	  <div id=" "> {$order.note_to_customer}</div></center>
	   <br>
{/if} 
    <div >
       <strong>{$LANG.common.order_id}</strong> &nbsp; {$order.cart_order_id}&nbsp; {$order.ship_method}&nbsp;{$order.ship_product}
<br>
<!--      <strong>{$LANG.orders.title_receipt_for}</strong> {$order.order_date}-->
      <strong>Order Date </strong> {$order.order_date}

      </div>
<br>   
<strong>Delivery Address:</strong>
<br>
              {$order.title_d} {$order.first_name_d} {$order.last_name_d}<br>
	  		{if !empty($order.company_name_d)}{$order.company_name_d}<br>{/if}
	  		{$order.line1_d} <br>
	  		{if !empty($order.line2_d)}{$order.line2_d}<br>{/if}
              {$order.town_d}{if !empty($order.state_d)}, {$order.state_abbrev_d} {/if}{$order.postcode_d}<br>
<!--{$order.town_d}, {$order.state_d} {$order.postcode_d}<br>-->

	  		{$order.country_d}

<br><br>

	  <div class="product">
      <span class="price">{$LANG.common.price}</span>
		<strong>{$LANG.common.product}</strong>
	  </div>
	  {foreach from=$order.items item=item}
	  <div class="product">
      <span class="price">{$item.price}</span>{$item.quantity} &times; {$item.name} {if !empty($item.product_code)}({$item.product_code}){/if} 
<!--PRODUCT DESCRIPTION -->
        {if isset($item.prodDesc)}
        <br><div>{$item.prodDesc}</div>
{/if}
<!-- END PRODUCT DESCRIPTION -->
		{if isset($item.options)}
		<ul>
		{foreach from=$item.options item=option}
		<li>{$option}</li>
		{/foreach}
		</ul>
		{/if}
	  </div>
	  {/foreach}

 <div id="totals">
		<div class="total">{$LANG.basket.total_sub} <strong>{$order.subtotal}</strong></div>
		<div class="total">{$LANG.basket.total_discount} {if !empty($order.percent)}({$order.percent}){/if} <strong>{$order.discount}</strong></div>
		<div class="total">{$LANG.basket.shipping} <strong>{$order.shipping}</strong></div>
		{if isset($order.taxes)} {foreach from=$order.taxes item=tax}
		<div class="total">{$tax.name} <strong>{$tax.value}</strong></div>
		{/foreach}{/if}
		<br>
		<div class="total"><strong>{$LANG.basket.total_grand} {$order.total}</strong></div>
	  </div>

<p><center>Thank you for buying from us!</center></p>
<p>  If there are any problems with your shipment, please let us know within three (3) days of receipt, and we will work with you to resolve the situation. We want you to be happy with your purchase.</p>
<p>Please bookmark our site at Dirty Butter Plush Animal Shoppe (https://dirtybutter.com/plushcatalog), as well as our Dirty Butter Estates Collectible Shoppe  (https://dirtybutterestates.com), and tell your friends and family about us.</p><p> We also run a free Plush Memories Lost Toy Search Service at https://www.facebook.com/groups/plushmemories. If we don't have a lovie you are looking for, we will be glad to help you find it.</p>
<p align="center"><i>"Jesus saith unto him, I am the way, the truth, and the life: no man cometh unto the Father, but by me."</i></p>
<p align="center">John 14:6 KJV</p>
	</div>

      <div id="footer">
<br/>
        <p><b>{$STORE.address}</b></p>
	</div>
 
  {/foreach}
  {/if}
</body>
</html>