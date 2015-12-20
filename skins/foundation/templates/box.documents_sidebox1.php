{if isset($DOCUMENTS_SIDEBOX1) && count($DOCUMENTS_SIDEBOX1) > 0}
<div class="panel" id="box-documents-sidebox1">
  <h3>{$LANG.documents.document_side_box_1_title}</h3>
  <ul>
  {if isset($CONTACT_URL)}
	<li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
  {/if}
  {foreach from=$DOCUMENTS_SIDEBOX1 item=document}
	<li><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
  {/foreach}
  </ul>
</div>
{/if}