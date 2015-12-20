<div id="box-documents-footer">
   <h3>{$LANG.documents.document_footer_title}</h3>
   <nav>
 <strong>
      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
		 {if isset($DOCUMENTS_FOOTER) && count($DOCUMENTS_FOOTER) > 0}
         {foreach from=$DOCUMENTS_FOOTER item=document}
         <li><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
         {/foreach}
		 {/if}
         {if isset($CONTACT_URL)}
         <li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
         {/if}
      </ul>
</strong>
   </nav>
</div>