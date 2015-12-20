<!--
+------------------------------------------------------+
|	              Manage Testimonials                  |
|            File : testimonials.index.php             |
|	                  By SemperFi                      | 
|         http://www.semperfiwebservices.com           |
+------------------------------------------------------+
-->

<form action="{$VAL_SELF}" method="post" id="testimonial_form" name="testimonial_form" enctype="multipart/form-data">

<!-- Start List Section -->
<!--I ADDED TITLE BELOW-->

  {if $LIST_TESTIMONIALS}
  <div id="testimonials" class="tab_content">
	<h3>Site Testimonials</h3>
	<table class="list" width="100%">
	  <thead>
		<tr>
		  <td width="5%" align="center">ID</td>
		  <td width="5%" align="center">Arrange</td>
		  <td width="5%" align="center">Status</td>
		  <td width="30%" align="center">Customer</td>
		  <td width="30%" align="center">Title</td>
		  <td width="30%" align="center">Short Testimonial</td>
		  <td width="15%" align="center">Date Added</td>
		  <td width="10%" align="center">&nbsp;</td>
		</tr>
	  </thead>
	  <tbody class="reorder-list">
	  {if isset($TESTIMONIALS)}
		{foreach from=$TESTIMONIALS item=testimonial}
	    <tr>
	      <td align="center">
	        <strong>{$testimonial.testimonial_id}</strong>
	      </td>
	      <td align="center">
	        <a href="#" class="handle"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/updown.gif" title="{$LANG.ui.drag_reorder}" /></a>
	        <input type="hidden" name="testimonial_order[]" value="{$testimonial.testimonial_id}" />
	      </td>
	      <td align="center">
	        <input type="hidden" name="testimonial_status[{$testimonial.testimonial_id}]" id="testimonial_{$testimonial.testimonial_id}" value="{$testimonial.testimonial_status}" class="toggle" />
	      </td>
	      <td align="center">
	    	{$testimonial.customer_name}
			<br />
	    	<i>{$testimonial.customer_email}</i>
			{if !empty($testimonial.testimonial_ip_address)}
				<br />
				{$testimonial.testimonial_ip_address}
			{/if}
	      </td>
<td align="center">
	    	{$testimonial.testimonial_title}
	      </td>
	      <td align="center">
	    	{$testimonial.testimonial_short}
	      </td> 
	      <td align="center">
	    	{$testimonial.testimonial_date}
	      </td>
	      <td align="center">
		    <a href="{$testimonial.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
		    <a href="{$testimonial.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
	      </td>
	    </tr>
	    {/foreach}
	  {else}
	    <tr>
	      <td colspan="8" align="center"><strong>{$LANG.form.none}</strong></td>
	    </tr>
	    {/if}
	  </tbody>
    </table>
  </div>
  {/if}
<!-- End List Section -->

<!-- Start Add/Edit Section -->
<!--I ADDED TITLE BELOW-->

  {if isset($MODE_ADDEDIT)}
  
  <div id="testimonial_general" class="tab_content">
	<h3>Site Testimonials</h3>
	<fieldset><legend>{$LANG.common.general}</legend>
	  <div><label for="testimonial_status">Status:</label><span><input type="hidden" name="testimonial[testimonial_status]" id="testimonial_status" value="{$TESTIMONIAL.testimonial_status}" class="toggle" /></span></div>
	  <div><label for="customer_name">Customer Name:</label><span><input type="text" name="testimonial[customer_name]" id="customer_name" class="textbox" value="{$TESTIMONIAL.customer_name}" /></span></div>
	  <div><label for="customer_email">Customer Email:</label><span><input type="text" name="testimonial[customer_email]" id="customer_email" class="textbox" value="{$TESTIMONIAL.customer_email}" /></span></div>
	  <div><label for="testimonial_ip_address">IP Address:</label><span><input type="text" name="testimonial[testimonial_ip_address]" id="testimonial_ip_address" class="textbox" value="{$TESTIMONIAL.testimonial_ip_address}" /></span></div>
	  <div><label for="testimonial_title">Title:</label><span><textarea name="testimonial[testimonial_title]" cols="35" rows="1" class="textbox">{$TESTIMONIAL.testimonial_title}</textarea></span></div>
	   <div><label for="testimonial_short">Short:</label><br><span><textarea name="testimonial[testimonial_short]" class="textbox fck">{$TESTIMONIAL.testimonial_short}</textarea></span></div>
      <div><label for="testimonial_long">Long:</label><br><span><textarea name="testimonial[testimonial_long]" class="textbox fck">{$TESTIMONIAL.testimonial_long}</textarea></span></div>
</fieldset>
  </div>
  <input type="hidden" name="testimonial[testimonial_date]" value="{$TESTIMONIAL.testimonial_date}" />
  <input type="hidden" name="testimonial[testimonial_id]" value="{$TESTIMONIAL.testimonial_id}" />

  {/if}
<!-- End Add/Edit Section -->

  <div class="form_control">
	<input type="hidden" name="previous-tab" id="previous-tab" value="" />
	<input type="submit" id="testimonial_save" value="{$LANG.common.save}" class="button" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />

</form>