{if isset($DOCUMENTS_SIDEBOX2) && count($DOCUMENTS_SIDEBOX2) > 0}
<div class="panel" id="box-documents-sidebox2">
  <h3>{$LANG.documents.document_side_box_2_title}</h3>
  <ul>
  {foreach from=$DOCUMENTS_SIDEBOX2 item=document}
	<li><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
  {/foreach}
  {if isset($CONTACT_URL)}
	<li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
  {/if}
  </ul>
</div>
{/if}