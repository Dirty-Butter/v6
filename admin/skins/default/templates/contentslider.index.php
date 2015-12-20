<!--
+------------------------------------------------------+
| Manage Content Slider                                |
| File : contentslider.index.php                       |
| By SemperFi                                          | 
| http://www.semperfiwebservices.com                   |
+------------------------------------------------------+
-->

<form action="{$VAL_SELF}" method="post" id="contentslider_form" name="contentslider_form" enctype="multipart/form-data">

<!-- Start List Section -->
{if $LIST_SLIDES}
  <div id="slides" class="tab_content">
	<h3>{$LANG.content_slider.admin_list_page_title}</h3>
	<table class="list" width="100%">
	  <thead>
		<tr>
		  <td width="10%" align="center">{$LANG.content_slider.admin_list_page_heading_status}</td>
		  <td width="10%" align="center">{$LANG.content_slider.admin_list_page_heading_arrange}</td>
		  <td width="70%" align="center">{$LANG.content_slider.admin_list_page_heading_title}</td>
		  <td width="10%" align="center">&nbsp;</td>
		</tr>
	  </thead>
	  <tbody class="reorder-list">
	  {if isset($SLIDES)}
	    {foreach from=$SLIDES item=slide}
	    <tr>
	      <td align="center">
	        <input type="hidden" name="slide_status[{$slide.slide_id}]" id="slide_{$slide.slide_id}" value="{$slide.slide_status}" class="toggle" />
	      </td>
	      <td align="center">
	        <a href="#" class="handle"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/updown.gif" title="{$LANG.ui.drag_reorder}" /></a>
	        <input type="hidden" name="slide_order[]" value="{$slide.slide_id}" />
	      </td>
	      <td align="left">
			{$slide.slide_title}
	      </td>
	      <td align="center">
		    <a href="{$slide.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
		    <a href="{$slide.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
	      </td>
	    </tr>
	    {/foreach}
	  {else}
	    <tr>
	      <td colspan="4" align="center"><strong>{$LANG.form.none}</strong></td>
	    </tr>
	  {/if}
	  </tbody>
    </table>
  </div>
{/if}
<!-- End List Section -->

<!-- Start Add/Edit Section -->
{if isset($MODE_ADDEDIT)}
  
  <div id="slide" class="tab_content">
	<h3>{$LANG.content_slider.admin_addedit_page_title}</h3>
	<fieldset><legend>{$LANG.common.general}</legend>
	  <div><label for="slide_status">{$LANG.content_slider.admin_addedit_page_field_status}</label><span><input type="hidden" name="slide[slide_status]" id="slide_status" value="{$SLIDE.slide_status}" class="toggle" /></span></div>
	  <div><label for="slide_order">{$LANG.content_slider.admin_addedit_page_field_order}</label><span><input type="text" name="slide[slide_order]" id="slide_order" class="textbox number" value="{$SLIDE.slide_order}" required /></span></div>
	  <div><label for="slide_title">{$LANG.content_slider.admin_addedit_page_field_title}</label><span><input type="text" name="slide[slide_title]" id="slide_title" class="textbox" value="{$SLIDE.slide_title}" required /></span></div>
	  <div><label for="slide_content">{$LANG.content_slider.admin_addedit_page_field_content}</label><br><br><span><textarea name="slide[slide_content]" class="textbox textbox fck" >{$SLIDE.slide_content}</textarea></span></div>
	</fieldset>
  </div>

  <input type="hidden" name="slide[slide_id]" value="{$SLIDE.slide_id}" />

{/if}
<!-- End Add/Edit Section -->

<div class="form_control">
	<input type="hidden" name="previous-tab" id="previous-tab" value="" />
	<input type="hidden" name="token" value="{$SESSION_TOKEN}" />
	<input type="submit" id="slide_save" value="{$LANG.common.save}" class="button" />
</div>

</form>