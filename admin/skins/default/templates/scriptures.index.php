<!--
+------------------------------------------------------+
| Manage Scriptures                                    |
| File : scriptures.index.php                          |
| By SemperFi                                          | 
| http://www.semperfiwebservices.com                   |
+------------------------------------------------------+
-->

<form action="{$VAL_SELF}" method="post" id="scripture_form" name="quotation_form" enctype="multipart/form-data">

<!-- Start List Section -->
  {if $LIST_SCRIPTURES}
  <div id="scriptures" class="tab_content">
	<h3>{$LANG.scriptures.admin_list_page_title}</h3>
	<table class="list" width="100%">
	  <thead>
		<tr>
		  <td width="5%" align="center">&nbsp;</td>
		  <td width="10%" align="center">{$LANG.scriptures.admin_list_page_heading_id}</td>
		  <td>{$LANG.scriptures.admin_list_page_heading_scripture_verse}</td>
		  <td width="10%" align="center">&nbsp;</td>
		</tr>
	  </thead>
	  <tbody class="reorder-list">
	  {if isset($SCRIPTURES)}
		{foreach from=$SCRIPTURES item=scripture}
	    <tr>
	      <td align="center">
			<input type="checkbox" name="bulkdelete[]" id="bulkdelete_{$scripture.scripture_id}" value="{$scripture.scripture_id}" class="bulkdelete" style="vertical-align: middle;" />
	      </td>
	      <td align="center">
			{$scripture.scripture_id}
	      </td>
	      <td>
	    	{$scripture.scripture_verse}
	      </td>
	      <td align="center">
		    <a href="{$scripture.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>
		    <a href="{$scripture.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a>
	      </td>
	    </tr>
	    {/foreach}
		<tr>
		<td colspan="4">
		<img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/select_all.gif" alt="" /> <a href="#" class="check-all" rel="bulkdelete">{$LANG.form.check_uncheck}</a> {$LANG.maintain.db_with_selected}
	  		  <select name="action" class="textbox">
	    	    <optgroup label="">
	      	      <option value="">{$LANG.form.please_select}</option>
				  <option value="delete">{$LANG.common.delete}</option>
	    	    </optgroup>
			  </select>
		</td>
		</tr>
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
  
  <div id="scripture_general" class="tab_content">
	<h3>{$LANG.scriptures.admin_addedit_page_title}</h3>
	<fieldset><legend>{$LANG.common.general}</legend>
	  <div><label for="scripture_verse">{$LANG.scriptures.admin_addedit_page_field_scripture_verse}</label><span>
<textarea name="scripture[scripture_verse]" class="textbox fck" required>{$SCRIPTURE.scripture_verse}</textarea>
</span></div> 
	</fieldset>
  </div>
  <input type="hidden" name="scripture[scripture_id]" value="{$SCRIPTURE.scripture_id}" />

  {/if}
<!-- End Add/Edit Section -->

  <div class="form_control">
	<input type="hidden" name="previous-tab" id="previous-tab" value="" />
	<input type="submit" id="quotation_save" value="{$LANG.common.save}" class="button" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />

</form>