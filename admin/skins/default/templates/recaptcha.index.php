<form action="{$VAL_SELF}" method="post" id="recaptcha_form" name="recaptcha_form" enctype="multipart/form-data">
  {if $LIST_BANNERS}
  <div id="recaptcha" class="tab_content">
    <h3>Recaptcha Records</h3>
    <table class="list">
      <thead>
        <tr>
          <td width="15" align="center">{$LANG.settings.category_id}</td>
          <td>{$LANG.common.arrange}</td>
          <td>{$LANG.common.visible}</td>
          <td>Recaptcha Title</td>
          <td>Answer</td>
          <td>Dimensions</td>
          <td>Recaptcha Image</td>
          <td>&nbsp;</td>
        </tr>
      </thead>
      <tbody class="reorder-list">      
      {if isset($BANNERSLIST)}
      {foreach from=$BANNERSLIST item=recaptcha_list}
      <tr>
        <td align="center"><strong>{$recaptcha_list.recaptcha_id}</strong></td>
        <td align="center" >  <a href="#" class="handle"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/updown.gif" title="{$LANG.ui.drag_reorder}" /></a>
          <input type="hidden" name="priority[]" value="{$recaptcha_list.recaptcha_id}" />
         </td>
        <td align="center"><input type="hidden" name="status[{$recaptcha_list.recaptcha_id}]" id="recaptcha_{$recaptcha_list.recaptcha_id}" value="{$recaptcha_list.status}" class="toggle" /></td>
        <td> {$recaptcha_list.recaptcha_title} </td>
        <td align="center"> {$recaptcha_list.answer}</td>
        <td align="center"> {$recaptcha_list.width} x {$recaptcha_list.height} </td>
        <td align="center"> {if $recaptcha_list.image_true == 1} <img src="{$recaptcha_list.imagePath}" alt=""  width="200" /> {/if} </td>
        <td><a href="{$recaptcha_list.edit}" title="{$LANG.common.edit}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/edit.png" alt="{$LANG.common.edit}" /></a>  <a href="{$recaptcha_list.delete}" class="delete" title="{$LANG.notification.confirm_delete}"><img src="{$SKIN_VARS.admin_folder}/skins/{$SKIN_VARS.skin_folder}/images/delete.png" alt="{$LANG.common.delete}" /></a> </td>
      </tr>
      {/foreach}
      {else}
      <tr>
        <td colspan="7" align="center"><strong>{$LANG.form.none}</strong></td>
      </tr>
      {/if}
      </tbody>      
    </table>
  </div>
  {/if}
  {if isset($MODE_ADDEDIT)}
  <div id="recaptcha_general" class="tab_content">
    <h3>Banner Details</h3>
    <fieldset>
      <legend>{$LANG.common.general}</legend>
      <div>
        <label for="status">{$LANG.common.status}</label>
        <span>
        <input type="hidden" name="recaptcha[status]" id="status" value="{$BANNERS.status}" class="toggle" />
        </span></div>
      <div>
        <label for="name"> Recaptcha Question:</label>
        <span>
        <input type="text" name="recaptcha[recaptcha_title]" {if !empty($BANNERS.recaptcha_title)}id="recaptcha_title"{else}id="name"{/if} class="textbox required" value="{$BANNERS.recaptcha_title}" />
        *</span></div>
        <div>
        <label for="recaptcha_link"> Answer:</label>
        <span>
        <input type="text" name="recaptcha[answer]" {if !empty($BANNERS.answer)}id="answer"{else}id="answer"{/if} class="textbox required" value="{$BANNERS.answer}" />
        *</span></div>
      <div>
        <label for="image">Recaptcha Image:</label>
        <span>
        <input type="file" name="image_file" id="image_file" {if !empty($BANNERS.recaptcha_file)}class="textbox"{else} class="textbox required" {/if}/>
        <input type="hidden" name="old_recaptcha_file" {if !empty($BANNERS.recaptcha_image)}id="recaptcha_file"{else}id="image"{/if} class="textbox" value="{$BANNERS.recaptcha_file}" />
       * </span> <span style="color:#F00;">(Recommended: 300 x 300)</span></div>
      <input type="hidden" name="width" id="width" value="{$BCONFIG.width}" />
      <input type="hidden" name="height" id="height" value="{$BCONFIG.height}" />
      <input type="hidden" name="recaptcha[flash]" id="flash" value="{$BANNERS.flash}" />
    </fieldset>
  </div>
  <input type="hidden" name="recaptcha[recaptcha_id]" value="{$BANNERS.recaptcha_id}" />
  {/if}  
  <div class="form_control">
    <input type="hidden" name="previous-tab" id="previous-tab" value="" />
    <input type="submit" id="cat_save" value="{$LANG.common.save}" class="button" />
  </div>
  <center>
    <img src="{$BANNERS.imagePath}" alt="" />
  </center>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
  {if !empty($BANNERS.recaptcha_title)}
  <input type="hidden" name="gen_seo" id="gen_seo" value="0" />
  <div id="dialog-seo" title="{$LANG.settings.seo_rebuild}" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>{$LANG.settings.seo_rebuild_description}</p>
  </div>
  {/if}
</form>
